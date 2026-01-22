<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'adress'  => 'required|string|max:255',
            'email'   => 'required|email',
            'service' => 'required|string|max:255',
            'date'    => 'required|date',
            'description' => 'nullable|string|max:4000',
            'fileInput' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:4048',
        ]);

        $data = $request->only(['name', 'phone', 'adress', 'email', 'service', 'date', 'description']);

        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');

            $path = $file->store('orders', 'public');

            $data['file_path'] = $path;
            $data['file_original_name'] = $file->getClientOriginalName();
        }

        $order = Order::create($data);

        try {
            Mail::to(env('ADMIN_EMAIL'))->queue(new SendMail($order->id));
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error($e->getMessage());
        }

        return back()->with('success', 'Vaša narudžba je uspješno poslana!');
    }
}
