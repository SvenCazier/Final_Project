<section id="contact">
    <div class="left"></div>
    <div class="right">
        <x-forms.form id="contactForm" class="form elevate" method="POST" action="/{{ app()->getLocale() }}/contact">
            <x-forms.input :label="__('general_form.name')" name="name" type="text" autocomplete="name" />
            <x-forms.input :label="__('general_form.email')" name="email" type="email" autocomplete="email" />
            <x-forms.select :label="__('general_form.subject')" name="subject">
                @foreach (App\Enums\ContactFormSubject::cases() as $subject)
                    <option value="{{ $subject->value }}">{{ __($subject->label()) }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.textarea :label="__('general_form.message')" name="message" />
            <x-button>{{ __('buttons.send') }}</x-button>
        </x-forms.form>
    </div>
</section>
