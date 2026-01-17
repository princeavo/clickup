<?php

/**
 * Script de test pour l'envoi d'emails
 * 
 * Usage: php test-email.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Mail\ContactFormMail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Support\Facades\Mail;

echo "🧪 Test d'envoi d'emails clicup\n";
echo "================================\n\n";

// Données de test
$testData = [
    'name' => 'Jean Dupont',
    'email' => 'jean.dupont@example.com',
    'phone' => '+33 6 12 34 56 78',
    'company' => 'Test Company',
    'message' => 'Ceci est un message de test pour vérifier que le système d\'envoi d\'emails fonctionne correctement.',
];

echo "📧 Configuration actuelle:\n";
echo "   MAIL_MAILER: " . env('MAIL_MAILER', 'non défini') . "\n";
echo "   MAIL_FROM: " . env('MAIL_FROM_ADDRESS', 'non défini') . "\n";
echo "   CONTACT_EMAIL: " . env('CONTACT_EMAIL', 'contact@clicup.com') . "\n\n";

try {
    echo "📤 Envoi de l'email de notification à l'équipe...\n";
    Mail::to(env('CONTACT_EMAIL', 'contact@clicup.com'))
        ->send(new ContactFormMail($testData));
    echo "   ✅ Email de notification envoyé avec succès!\n\n";

    echo "📤 Envoi de l'email de confirmation au client...\n";
    Mail::to($testData['email'])
        ->send(new ContactConfirmationMail($testData));
    echo "   ✅ Email de confirmation envoyé avec succès!\n\n";

    if (env('MAIL_MAILER') === 'log') {
        echo "ℹ️  Mode LOG activé - Les emails sont dans storage/logs/laravel.log\n";
        echo "   Pour voir les emails: tail -f storage/logs/laravel.log\n\n";
    }

    echo "✅ Test terminé avec succès!\n";
    
} catch (\Exception $e) {
    echo "❌ Erreur lors de l'envoi: " . $e->getMessage() . "\n";
    echo "   Vérifiez votre configuration dans le fichier .env\n";
    exit(1);
}
