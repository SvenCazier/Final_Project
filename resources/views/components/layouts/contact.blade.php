<section id="contact" class="content-grid">
    <div class="left">
        <h2 class="title article__title--main">
            <span class="article__title--underline">{{ __('contact.title_underline') }}</span>
            {{ __('contact.title_normal') }}
        </h2>
        <h5>{{ __('contact.text') }}</h5>
    </div>
    <div class="right">
        <x-forms.form id="contactForm" class="form elevate" method="POST" action="/{{ app()->getLocale() }}/contact">
            <x-forms.input :label="__('general_form.name')" name="name" type="text" autocomplete="name" />
            <x-forms.input :label="__('general_form.email')" name="email" type="email" autocomplete="email" />
            <x-forms.custom-select :label="__('general_form.subject')" name="subject" :options="App\Enums\ContactFormSubject::getContactFormSubjectOptions()" />
            <x-forms.textarea :label="__('general_form.message')" name="message" />
            <x-button>{{ __('buttons.send') }}</x-button>
        </x-forms.form>
    </div>
</section>
