<x-mail::message>
# 📩 Nouveau message de contact

Vous avez reçu un nouveau message depuis le formulaire de contact de votre site web.

## 👤 Informations du contact

**Nom :** {{ $contactData['name'] }}  
**Email :** {{ $contactData['email'] }}  
@if(!empty($contactData['phone']))
**Téléphone :** {{ $contactData['phone'] }}  
@endif
@if(!empty($contactData['company']))
**Entreprise :** {{ $contactData['company'] }}  
@endif

---

## 💬 Message

{{ $contactData['message'] }}

---

<x-mail::button :url="'mailto:' . $contactData['email']" color="success">
Répondre par email
</x-mail::button>

Cordialement,  
{{ config('app.name') }}
</x-mail::message>
