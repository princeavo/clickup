<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactFormMail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'message.required' => 'Le message est obligatoire.',
        ]);

        try {
            // 1. Sauvegarder en base de données
            Contact::create($validated);
            
            // 2. Envoyer l'email de notification
            $recipientEmail = env('CONTACT_EMAIL', 'contact@clickup.com');
            Mail::to($recipientEmail)->send(new ContactFormMail($validated));
            
            // 3. Envoyer un email de confirmation au client (optionnel)
            // Mail::to($validated['email'])->send(new ContactConfirmationMail($validated));
            
            // Log des données pour debug
            Log::info('Nouveau contact reçu et email envoyé', [
                'contact' => $validated,
                'recipient' => $recipientEmail
            ]);

            // Optionnel : Envoyer à un webhook (Zapier, Make, etc.)
            // Http::post('https://hooks.zapier.com/...', $validated);

            return back()->with('success', 'Merci ! Votre message a été envoyé avec succès. Nous vous recontacterons rapidement.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du formulaire de contact', [
                'error' => $e->getMessage(),
                'data' => $validated
            ]);

            return back()
                ->withInput()
                ->withErrors(['error' => 'Une erreur est survenue. Veuillez réessayer.']);
        }
    }
}
