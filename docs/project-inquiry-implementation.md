# Project inquiry implementation handover

Implemented locally on 2026-11-02. Nothing was deployed. Existing contact forms, controllers, Order records, public uploads and CTA buttons were retained. Pre-existing working-tree changes were preserved.

## Inspection and compatibility

Installed: PHP 8.4.25, Laravel 12.41.1, Livewire 3.7.1, Tailwind 4.1.18, Alpine 3.15.4, Vite 5.4.21, Pest 3.8.4. No new dependencies or database migrations.

The existing site uses layouts.site, self-hosted Michroma/Saira fonts, primary #5230e5 and secondary #f5f5f5. Existing app.js starts Alpine independently. The inquiry page uses a separate Vite entry without Alpine so Livewire supplies its bundled instance. Other pages keep their existing entry. Only the inquiry route suppresses the layout's Google reCAPTCHA script; legacy validation remains unchanged.

## Files created

- app/Support/InquiryQuestions.php: service allowlist, question definitions, conditional visibility, per-service budget ranges and shared questions.
- app/Livewire/ProjectInquiry.php: three-step navigation, validation, safe draft restoration, synchronous delivery, spam controls and duplicate guards.
- app/Mail/ProjectInquiryMail.php: dedicated Mailable, validated Reply-To, configured agency From.
- app/Console/Commands/CleanupInquiryUploads.php: cleanup scoped to the new private temporary disk and livewire-tmp directory.
- config/inquiry.php: recipient and privacy URL configuration.
- config/livewire.php: explicitly private Livewire temporary storage, throttled uploads and cleanup.
- resources/views/project-inquiry.blade.php: standalone page using the site layout.
- resources/views/livewire/project-inquiry.blade.php: form, progress, Bosnian text, local draft option, loading/error/success states.
- resources/views/livewire/inquiry-question.blade.php: shared accessible question renderer.
- resources/views/mail/project-inquiry.blade.php: structured HTML email with escaped user content.
- resources/js/inquiry.js: frontend entry without a second Alpine instance.
- tests/Feature/ProjectInquiryTest.php: 17 automated tests.
- docs/project-inquiry-implementation.md: this handover.

## Files modified by this feature

- routes/web.php: append named GET /zatrazi-ponudu route only.
- routes/console.php: hourly private temporary upload cleanup schedule.
- config/filesystems.php: dedicated private disk with serving disabled.
- resources/views/layouts/site.blade.php: route-specific asset entry and reCAPTCHA exclusion.
- vite.config.js: add inquiry entry.
- .env.example: document optional inquiry settings. No production secrets changed.

The local build regenerated ignored public/build artifacts.

## Architecture and validation

Services are web, webshop, app, seo, marketing, branding and other. URL preselection accepts only allowlisted strings, safely ignoring arrays and unknown values. Question metadata drives rendering, validation, draft filtering and email rows. Required project fields validate before step 3. Final submission repeats service/project/contact validation; step and delivery status are Livewire-locked properties.

Switching services retains description and start timing, clears service answers and clears budget because valid ranges can differ. Back/Next keeps current answers. Hidden fields are never validated or emailed; arbitrary injected answer keys are ignored. URLs must use HTTP/HTTPS, options are allowlisted, checkbox options are bounded and distinct, text has size limits, and budgets remain optional.

## Draft persistence

Draft saving is opt-in, in sessionStorage under reunion-inquiry:v1. Only service and project answers are serialized; contact fields and attachments are excluded. Restored data is bounded, filtered against known questions/options and conditional visibility, and never restores contact properties. Explicit URL service preselection takes precedence over an incompatible saved service. Drafts are removed after success or when the option is disabled. Browser storage failure leaves normal Livewire navigation usable. Text warns users not to put sensitive data in project descriptions; free-text content cannot be guaranteed nonpersonal by technical filtering alone.

## Mail and attachment privacy

Recipient is INQUIRY_ADMIN_EMAIL, falling back to ADMIN_EMAIL when the former is absent. An explicitly empty inquiry setting must be filled or removed to use fallback. Invalid/missing recipients yield a visitor-safe failure. Existing MAIL_* configuration supplies the sender and direct transport. No completed inquiries or drafts are written to MySQL and there is no Order dependency.

Mail sends synchronously, with a selected-service subject, relevant labeled answers, contact details, timestamp and optional attachment. Success follows transport acceptance, not guaranteed inbox delivery. Logging/composite transports are rejected to avoid private payloads leaking through a log fallback. Array transport is permitted in automated tests but never reports production success. Configure a direct SMTP or supported API transport for staging/production.

Files are validated server-side by detected MIME, extension family and 4096 KiB maximum. Bytes are attached directly from Livewire's private temporary upload using a generated generic attachment name and detected MIME. No permanent copy/public disk write occurs. Successful uploads are deleted; cleanup failures are left for scheduled cleanup. Failed submissions retain the upload for retry. Abandoned/invalid/replaced uploads expire through Livewire's 24-hour cleanup on subsequent uploads, plus the hourly cleanup command when Laravel scheduling runs. This is a temporary-file cleanup mechanism, not a statement of business/legal retention policy.

Important shared change: Livewire temporary uploads for admin components also use the new private disk. Their explicit final public stores remain unchanged. Existing pending temporary upload sessions may need the user to reselect the file after deployment. Verify admin upload smoke tests in staging. Existing files on the old temporary disk are not deleted or migrated by this feature.

## Abuse controls

Five submit attempts per hashed client IP per ten minutes, Laravel cache locks, a random locked submission token, a one-day cache marker for replay protection, a honeypot, Livewire CSRF middleware, bounded server validation and disabled loading controls. Temporary upload endpoint is throttled at 20 requests/minute. Cache records contain tokens/counters only, not answers or contacts. Use a persistent shared cache supporting atomic locks; array cache is for tests only. Configure trusted proxies correctly so IP limiting matches actual visitors. Cache failures or process death after transport acceptance can still leave ambiguous delivery; SMTP cannot guarantee exactly-once delivery across infrastructure failures.

No external CAPTCHA or tracking dependency was added. No complete payloads, contact details, private files or raw transport exceptions are logged by this feature.

## Verification

- Inquiry suite: 17 passed, 88 assertions, including every service, safe preselection, navigation, conditional/hidden answers, contacts, omitted budget, Mail::fake delivery, no database connection/public writes, valid and invalid attachments, deletion, throttling, honeypot, transport failure, HTML escaping and scoped abandoned-upload cleanup.
- Full suite before the last three additional inquiry tests: 30 passed, 9 failed, 104 assertions. Failures concern existing authentication redirects to the missing dashboard route (4) and missing /profile functionality (5). These routes were already absent in inspected routes/web.php and were not changed by this task.
- npm.cmd run build: passed, 55 modules transformed, both application and inquiry bundles emitted. Initial sandbox build failed reading parent directories; approved local build succeeded outside the sandbox.
- php artisan view:cache: passed.
- Scoped Laravel Pint: passed after formatting new PHP files.
- git diff --check: passed.

Existing untracked bootstrap/cache/routes-v7.php is stale and was preserved. Test runs set APP_ROUTES_CACHE to storage/framework/cache/testing-routes.php (an absent isolated cache path), ensuring source routes are tested without deleting the user's cached file. Tests use array cache/session/mail and in-memory SQLite; no production database was queried.

Browser end-to-end verification of sessionStorage synchronization, keyboard focus, responsive appearance, slow uploads and actual SMTP receipt remains a staging/manual check. Automated tests verify server rendering and restoration filtering, not browser execution.

## Deployment runbook (not executed)

1. Review this patch independently of pre-existing local edits; back up the current release/configuration. Use staging first.
2. Confirm PHP/extensions and locked package versions. On the release builder run composer install --no-dev --prefer-dist --optimize-autoloader, npm ci, then npm run build. Ship source and generated public/build assets together.
3. Set INQUIRY_ADMIN_EMAIL to the intended administrator mailbox (or omit it and configure ADMIN_EMAIL). Set INQUIRY_PRIVACY_URL to the approved published policy. Confirm direct MAIL_MAILER/MAIL_* delivery and authenticated From. Do not use log, array or log-fallback mailers.
4. Ensure storage/app/private/livewire and normal Laravel runtime directories are writable only by the application user; keep the web server document root at public. Never create a public symlink to the private disk. Verify proxy/request body limits, PHP upload_max_filesize >=4M and post_max_size comfortably above 4M.
5. Configure a persistent shared cache with atomic locks. Ensure application PHP max execution time and mail transport timeout fit within the 120-second duplicate lock, and set an appropriate finite SMTP timeout operationally.
6. Enable the normal scheduler cron: * * * * * cd /path/to/release && php artisan schedule:run > /dev/null 2>&1. Verify inquiry:cleanup-uploads is listed in php artisan schedule:list. That command touches only expired files under the new private temporary directory.
7. Rebuild release caches: php artisan config:cache, php artisan route:cache, php artisan view:cache. Rebuilding the route cache is essential to expose the new route. No migration, queue worker or storage:link change is required for this feature.
8. In staging, test /zatrazi-ponudu and each supported service query, full submission with and without attachment, inbox/Reply-To, invalid input, failure handling, browser refresh recovery, success draft deletion, mobile/keyboard access and admin upload regression. Confirm no Google request originates from the new page.
9. Resolve or explicitly accept unrelated baseline test failures, approve the privacy notice/policy and complete review before production release. Deploy only after separate explicit authorization.
10. Rollback by restoring the prior release/assets/config cache and rebuilding routes. Do not delete orders or uploads. Re-select in-flight temporary files if necessary.

## Legacy dependencies for second-phase review

Order model/table and migrations retain name, phone, misspelled adress, email, service, description, requested date, timestamps and optional file_path/file_original_name. ContactController::send validates old reCAPTCHA, stores orders/* on public, creates Order and calls SendMail(order id). SendMail reads that record and attaches storage/app/public/{file_path} with the original name. The old controller catches mail failures but returns success and logs exception messages: this existing behavior was deliberately not altered.

The shared x-form component queries Category records and posts to send.order. It is embedded in contact, about-us, b4b, google-ads, foto-video, portfolio, web-dev, web-design, web-aplikacije, team-building, branding, social-media, services, price and pr Blade templates. All remain unchanged by this feature.

There are 20 files in local storage/app/public/orders at inspection time. No filenames/content were copied into this report. The application has no local SQLite database file; historical Order rows were not enumerated from a potentially live MySQL connection. An authorized database owner should inventory IDs and linked paths privately with:

    SELECT id, created_at, file_path FROM orders ORDER BY id;

Reconcile that private inventory against public orders/*, original-name metadata, backups and existing email attachments before deciding retention/migration/removal. Do not publish contact data in the report. No record/file deletion was performed.

Admin Documentation stores files in public documentation/* and deletes them through the public disk; project_structure_nodes.file_path and ProjectDocumentationController plus projects.documentation depend on that flow. Other public project images/galleries and post images also use public storage and must not be swept up in an order-upload cleanup. Review public storage symlinks and server access rules separately.

## Proposed second phase

After staging acceptance, legal/privacy review and explicit integration approval: replace old x-form embeds incrementally with Bosnian CTA links to /zatrazi-ponudu?service=..., using service-specific mappings only where appropriate (general inquiry for unrelated services). Update contact navigation/CTAs, monitor delivery and conversion, then deprecate legacy POST handling in a separately reviewed change. Audit historical Order/document dependencies and agree authorized retention/migration before deleting anything. Remove global legacy reCAPTCHA only after all consumers are retired.
