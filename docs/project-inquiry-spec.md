# CODEX TASK — Reunion Agency: Project Inquiry & Quotation Form

## 1. Project context

We are working on the existing production website:

**Website:** reunionagencija.com  
**Framework:** Laravel 12  
**Frontend:** Tailwind CSS, Alpine.js  
**Components:** Livewire 3  
**Database:** MySQL

The website belongs to Reunion, a digital marketing and web development agency in Bosnia and Herzegovina.

We want to replace our existing generic contact/order form with a modern, professional, multi-step project inquiry form.

The primary goal is to collect sufficiently detailed project requirements so that our team can evaluate incoming inquiries and prepare accurate commercial proposals.

A secondary, equally important goal is to improve personal data protection and reduce unnecessary collection and storage of personal information.

All user-facing text must be in **Bosnian (Latin script, ijekavian)**.

## 2. Important implementation instructions

Before writing any code:

1. Inspect the existing Laravel application structure.
2. Identify the main frontend layout, design system, routes, Livewire setup and mail configuration.
3. Review the existing contact form, ContactController, Order model, SendMail mailable and relevant Blade templates.
4. Identify any dependencies on the existing form or Order records.
5. Check the installed versions of Livewire, Tailwind and other relevant packages.

Reuse the existing architecture and design conventions wherever possible.

Do not install additional packages unless strictly necessary.

Do not modify unrelated components.

Do not remove the existing contact form, controller, database tables, routes or historical records during this phase.

**Build and test the new system independently first.**

If any architectural decision could affect existing functionality, explain the issue before making a destructive change.

## 3. New page and routing

Create a new public page:

`/zatrazi-ponudu`

Page title:

**Zatražite ponudu za svoj projekt**

Introductory text:

"Recite nam nešto više o svom projektu. Odgovorite na nekoliko kratkih pitanja kako bismo bolje razumjeli vaše potrebe i pripremili odgovarajuću ponudu."

The page must use the existing Reunion frontend layout and visual identity.

Support optional URL parameters for service preselection:

- `/zatrazi-ponudu?service=web`
- `/zatrazi-ponudu?service=webshop`
- `/zatrazi-ponudu?service=app`
- `/zatrazi-ponudu?service=seo`
- `/zatrazi-ponudu?service=marketing`
- `/zatrazi-ponudu?service=branding`

Validate the incoming service parameter against an explicit allowlist.

Invalid or unknown values should fall back to the standard service selection.

Do not automatically modify existing service page buttons yet.

## 4. Multi-step form structure

Implement the form using Livewire 3.

The form contains three main steps:

**Step 1 — Odabir usluge**

**Step 2 — Detalji projekta**

**Step 3 — Kontakt podaci i slanje**

Requirements:

- Clearly display the current step.
- Provide Back and Continue buttons.
- Preserve previously entered answers when moving between steps.
- Validate each step before proceeding.
- Display clear field-level validation messages.
- Do not reset answers when moving backward.
- Use appropriate input types and accessible labels.
- Support keyboard navigation.
- Provide a responsive layout for mobile, tablet and desktop.
- Disable duplicate submissions while the request is being processed.

Use Livewire state for normal step navigation.

Additionally, implement optional draft persistence using browser `sessionStorage` so users can recover project answers after accidentally refreshing the page.

Draft persistence rules:

- Store only service selection and non-sensitive project answers.
- Do not store name, email, phone number or uploaded documents.
- Do not persist drafts in MySQL.
- Use a versioned storage key to avoid conflicts after future updates.
- Restore saved answers safely, validating their structure.
- Clear the draft after successful submission.
- Do not restore hidden or irrelevant answers from a previously selected service.
- Keep the draft local to the browser tab.
- Provide a short notice explaining temporary local draft storage.

If reliable Livewire/sessionStorage synchronization introduces unnecessary complexity, prioritize correct Livewire navigation and implement refresh recovery separately.

## 5. Step 1 — Service selection

Display the following services:

1. Web stranica
2. Webshop
3. Web aplikacija
4. SEO optimizacija
5. Digitalni marketing i oglašavanje
6. Brending i grafički dizajn
7. Ostalo

Only one primary service can be selected.

The user must be able to change the selected service.

When a service is preselected through the URL, display it as selected but still allow modification.

Changing the service must not cause unrelated answers from the previous service to be included in the final email.

## 6. Step 2 — Dynamic project questions

Render questions dynamically based on the selected service.

Prefer configuration-driven question definitions instead of creating separate large forms with duplicated logic.

Use conditional visibility where appropriate.

### A. Web stranica

Questions:

1. **Imate li već web stranicu?**
    - Da
    - Ne

2. **Adresa postojeće web stranice**
    - URL field
    - Display only if the previous answer is Da
    - Optional

3. **Šta želite uraditi?**
    - Izrada nove web stranice
    - Redizajn postojeće
    - Nadogradnja postojeće
    - Nisam siguran

4. **Kakva vam je web stranica potrebna?**
    - Prezentacijska
    - Korporativna
    - Višejezična
    - Nisam siguran

5. **Imate li pripremljene tekstove i fotografije?**
    - Da
    - Djelimično
    - Ne

6. **Koje dodatne funkcionalnosti su vam potrebne?**
    - Blog / novosti
    - Više jezika
    - Online rezervacije
    - Napredne kontakt forme
    - Integracije s drugim sistemima
    - Ostalo
    - Nisam siguran

    Allow multiple selections.

7. **Imate li primjere web stranica ili dizajna koji vam se sviđaju?**
    - Optional text field for links or description

8. **Znate li na kojoj tehnologiji radi postojeća stranica?**
    - WordPress
    - Laravel
    - Drugo
    - Ne znam

    Optional. Display only when an existing website is indicated.

### B. Webshop

Questions:

1. **Imate li postojeći webshop?**
    - Da
    - Ne

2. **Adresa postojećeg webshopa**
    - Optional URL, shown conditionally

3. **Šta želite uraditi?**
    - Novi webshop
    - Redizajn
    - Migracija
    - Nadogradnja

4. **Koliko proizvoda planirate prodavati?**
    - Do 50
    - 50–200
    - 200–1.000
    - Više od 1.000
    - Nisam siguran

5. **Na kojoj platformi radi postojeći webshop?**
    - WooCommerce
    - Shopify
    - Magento
    - Drugo
    - Ne znam

    Optional and conditional.

6. **Koje načine plaćanja želite?**
    - Pouzećem
    - Kartično plaćanje
    - Bankovna uplata
    - Nisam siguran

    Allow multiple selections.

7. **Trebate li posebne integracije?**
    - Dostavne službe
    - Skladište / ERP
    - Računovodstveni sistem
    - Ostalo
    - Nisam siguran

8. **Jesu li fotografije, opisi i cijene proizvoda pripremljeni?**
    - Da
    - Djelimično
    - Ne

9. **Ko će unositi proizvode?**
    - Mi ćemo unositi proizvode
    - Potrebno je da Reunion unese proizvode
    - Dogovorit ćemo naknadno

10. **Imate li primjere webshopova čiji vam se dizajn sviđa?**
    - Optional links or description

### C. Web aplikacija

Questions:

1. **Koji poslovni problem želite riješiti aplikacijom?**
    - Multiline text

2. **Ko će koristiti aplikaciju?**
    - Zaposleni
    - Klijenti
    - Poslovni partneri
    - Javnost
    - Drugo

    Allow multiple selections.

3. **Koje su najvažnije funkcionalnosti aplikacije?**
    - Multiline text

4. **Postoji li već aplikacija koju želite unaprijediti ili zamijeniti?**
    - Da
    - Ne

5. **Postojeća aplikacija ili primjer sličnog rješenja**
    - Optional URL or description

6. **Treba li se aplikacija povezivati s drugim sistemima?**
    - Da
    - Ne
    - Nisam siguran

    If Da, allow an optional description.

7. **Imate li tehničku specifikaciju ili projektnu dokumentaciju?**
    - Da
    - Ne

    Allow an optional document upload in the final step.

Do not ask nontechnical clients to choose a programming language or framework.

### D. SEO optimizacija

Questions:

1. **Adresa vaše web stranice**
    - URL

2. **Koje tržište želite ciljati?**
    - Lokalno
    - Bosna i Hercegovina
    - Regionalno
    - Međunarodno

3. **Šta vam je primarni cilj?**
    - Više upita
    - Više prodaje
    - Bolja lokalna vidljivost
    - Veći organski promet
    - Nisam siguran

4. **Da li ste ranije radili SEO optimizaciju?**
    - Da
    - Ne
    - Nisam siguran

### E. Digitalni marketing i oglašavanje

Questions:

1. **Koje usluge vas zanimaju?**
    - Google Ads
    - Meta Ads
    - Upravljanje društvenim mrežama
    - Strategija digitalnog marketinga
    - Nisam siguran

2. **Šta je vaš glavni cilj?**
    - Više upita
    - Povećanje prodaje
    - Prepoznatljivost brenda
    - Drugo

3. **Imate li postojeće kampanje?**
    - Da
    - Ne

4. **Koliki je okvirni mjesečni budžet za oglašavanje?**
    - Do 500 KM
    - 500–1.500 KM
    - 1.500–3.000 KM
    - Više od 3.000 KM
    - Nisam siguran

This question is optional.

Clearly distinguish advertising spend from the agency's service fee.

### F. Brending i grafički dizajn

Questions:

1. **Šta vam je potrebno?**
    - Logo
    - Kompletan vizuelni identitet
    - Brand guidelines
    - Grafički materijali
    - Ostalo

2. **Imate li postojeći vizuelni identitet?**
    - Da
    - Ne
    - Potrebno je osvježenje

3. **Gdje će se dizajn koristiti?**
    - Digitalni kanali
    - Štampani materijali
    - Ambalaža
    - Više namjena

4. **Imate li primjere dizajna koji vam se sviđaju?**
    - Optional links or description

### G. Ostalo

Questions:

1. **Koja usluga ili vrsta projekta vas zanima?**
    - Short text

2. **Šta želite postići?**
    - Multiline text

3. **Imate li postojeće materijale ili reference?**
    - Optional links or description

## 7. Shared project questions

At the end of Step 2, display shared questions for every service.

**Opis projekta**

A multiline text field where the user can explain additional requirements.

Do not force users to repeat information already provided through service-specific questions.

If the selected service already includes substantial free-text answers, label this field "Dodatne informacije" and make it optional.

**Kada biste željeli započeti projekt?**

Options:

- Što prije
- U narednih 1–3 mjeseca
- Kasnije
- Nisam siguran

**Koliki je okvirni budžet?**

Optional.

Use reasonable service-specific budget ranges.

Include:

"Nisam siguran, potrebna mi je procjena."

For digital marketing, distinguish project/service budget from monthly advertising spend.

Never reject a submission because the user did not select a budget.

## 8. Step 3 — Contact information

Fields:

**Ime i prezime**

- Required
- Maximum 255 characters

**Naziv firme**

- Optional
- Maximum 255 characters

**Email**

- Required
- Valid email format

**Telefon**

- Optional
- Use HTML input type tel

**Projektna dokumentacija**

- Optional
- Single attachment
- Allowed formats: PDF, DOC, DOCX, JPG, PNG
- Maximum size: 4 MB
- Validate MIME type and file size server-side
- Do not trust original filenames
- Do not expose files through public storage

Do not request a physical address.

Before submission, display a concise personal data processing notice with a link to the privacy policy.

Use placeholder text or a configurable route if the final privacy policy is not yet published.

Do not invent legal text, data retention periods or legal bases.

Do not automatically add a mandatory consent checkbox for ordinary project inquiries. The appropriate legal basis must be confirmed separately.

## 9. Email delivery

All inquiries must be sent directly to the configured administrator email.

Do not create new Order records.

Do not persist completed inquiries in MySQL.

Create a dedicated Mailable for the new form.

The email must contain:

- Selected service
- All relevant project answers
- Contact details
- Submission date and time
- Optional attachment

Use a professional, clearly structured HTML email template.

Subject example:

`Novi upit za ponudu — Web stranica`

Use the application's configured mail system.

Do not hardcode email addresses or credentials.

Use an appropriate configured administrator recipient address.

If possible, configure Reply-To using the validated sender email, while keeping From as the authenticated agency mailbox.

Do not display a success message unless mail delivery has been accepted by the configured transport.

Handle transport errors safely, without exposing credentials or technical details to visitors.

Do not log complete form payloads, private documents or sensitive contact information.

## 10. File handling and privacy

Do not use Laravel's public storage disk for project attachments.

Prefer attaching the validated temporary upload file directly to the email using supported Laravel and Livewire mechanisms.

Avoid unnecessary permanent file copies.

If temporary private storage is required:

- Keep files outside the public web root.
- Use unpredictable filenames.
- Ensure only the application can access them.
- Remove temporary files after processing where safe.
- Account for failed submissions and abandoned uploads.
- Verify Livewire temporary upload cleanup behavior.

Do not delete existing uploaded documents or Order records.

Existing records and files will be reviewed and migrated or deleted separately after the new system is deployed and tested.

## 11. Spam and abuse protection

The existing website previously loaded Google reCAPTCHA globally.

The old ContactController validates `g-recaptcha-response` through `App\Rules\ReCaptcha`.

Do not reuse this integration blindly.

Implement a privacy-conscious spam protection strategy.

Minimum requirements:

- Laravel rate limiting
- A honeypot field
- Server-side validation
- Reasonable input size limits
- Protection against duplicate submissions
- CSRF protection
- Safe handling of malformed input

Prefer a solution that does not load Google scripts or establish third-party tracking connections.

If an external CAPTCHA is genuinely required, explain the privacy implications and request approval before integrating it.

Do not remove existing reCAPTCHA validation from the old production form during the initial implementation.

## 12. Design requirements

The new page should look like a natural part of the existing Reunion website.

Use the existing typography, colors, spacing, buttons and Tailwind conventions.

Do not introduce a completely new visual identity.

The form should feel professional, modern and easy to complete.

Requirements:

- Clear progress indicator
- Generous spacing
- Readable labels
- Accessible focus states
- Responsive layout
- Appropriate hover and disabled states
- Smooth transitions where useful
- Clear validation errors
- Loading indicator during submission
- Success confirmation after successful submission

Avoid unnecessary animations or complicated interfaces.

The form must remain usable without relying on animation.

## 13. Validation and conditional behavior

Implement server-side validation for every step and for final submission.

Do not rely exclusively on browser validation.

When the selected service changes:

- Clear or ignore answers belonging to the previous service.
- Preserve relevant shared answers.
- Do not send hidden or unrelated fields.

For conditional questions:

- Validate only currently applicable fields.
- Do not include irrelevant hidden answers in the email.
- Prevent manipulation of service identifiers and option values.
- Validate URL inputs appropriately.
- Escape all user-supplied text in HTML email templates.

## 14. Testing requirements

Create appropriate automated tests using the testing framework already configured in the project.

Test at least:

1. The new page loads successfully.
2. Valid service preselection works.
3. Invalid service parameters are handled safely.
4. Step validation works.
5. Answers survive Back/Next navigation.
6. Conditional fields appear correctly.
7. Hidden irrelevant answers are excluded.
8. Required contact fields are validated.
9. Optional budgets are accepted.
10. Valid email submissions are delivered using Mail::fake().
11. Invalid attachments are rejected.
12. No Order database records are created.
13. No permanent public attachments are created.
14. Rate limiting prevents excessive submissions.
15. Failed email delivery does not produce a false success message.

Verify compatibility with the actual installed Livewire version.

## 15. Deployment safety

This is an existing production application.

Do not:

- Delete existing database tables.
- Delete historical Order records.
- Delete existing uploaded files.
- Modify unrelated routes.
- Replace existing contact forms before testing.
- Change production environment secrets.
- Modify unrelated admin functionality.

Implement the new system in isolation.

The existing website must remain operational throughout development.

## 16. Expected deliverables

After implementation, provide:

1. A summary of all created and modified files.
2. Explanation of the new form architecture.
3. Explanation of draft persistence.
4. Explanation of email and attachment handling.
5. Explanation of spam protection.
6. Test results.
7. Any unresolved security or privacy considerations.
8. Exact deployment steps.
9. A proposed second-phase plan for replacing old forms with CTA buttons.
10. A list of existing Order records and public upload dependencies that require later review.

## 17. Final instruction

Implement this as a production-quality feature, not a temporary prototype.

Prioritize maintainability, accessibility, security, privacy and clear user experience.

Avoid unnecessary abstractions and dependencies.

Use existing project conventions.

If you discover a conflict between these instructions and the actual codebase, explain the conflict and choose the safest non-destructive solution.

**Do not deploy to production automatically.**

Complete the implementation locally, run available tests, and report the results before requesting approval for integration and deployment.
