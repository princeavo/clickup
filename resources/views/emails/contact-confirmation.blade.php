<x-mail::message>
# Merci {{ $contactData['name'] }} ! 🎉

Nous avons bien reçu votre message et nous vous en remercions.

Notre équipe va l'examiner attentivement et vous répondra dans les plus brefs délais, généralement sous **24 à 48 heures**.

## 📝 Récapitulatif de votre demande

**Nom :** {{ $contactData['name'] }}  
**Email :** {{ $contactData['email'] }}  
@if(!empty($contactData['phone']))
**Téléphone :** {{ $contactData['phone'] }}  
@endif
@if(!empty($contactData['company']))
**Entreprise :** {{ $contactData['company'] }}  
@endif

**Votre message :**  
{{ $contactData['message'] }}

---

## 🚀 En attendant notre réponse

Découvrez comment nous aidons les marques e-commerce à transformer leur budget pub en ventes prévisibles grâce à notre méthode CREA™.

<x-mail::button :url="config('app.url')" color="primary">
Découvrir nos services
</x-mail::button>

---

**Questions urgentes ?**  
N'hésitez pas à nous contacter directement :  
📧 {{ env('CONTACT_EMAIL', 'contact@clickup.com') }}  
📱 WhatsApp : [Nous contacter](https://wa.me/votre-numero)

À très bientôt,  
**L'équipe {{ config('app.name') }}**

<x-mail::subcopy>
Cet email est une confirmation automatique de la réception de votre message.  
Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.
</x-mail::subcopy>
</x-mail::message>
