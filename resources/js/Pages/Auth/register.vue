<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import SessionMessage from '../../Components/SessionMessage.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
})

const submit = () => {
        form.post(route('register'), {
                onFinish: () => form.reset('password', 'confirm_password')
        })
}

</script>

<template>
         <Head title="register" />
   <Container class="w-1/2 ">
        <div class="text-center mb-8">
                <Title>register an account</Title>
                <p>already have an account? <TextLink routeName="login" label="login" />  </p>
        </div>

        <SessionMessage :status="status" />

        <ErrorMessage :errors="form.errors" />

        <form @submit.prevent="submit" class="space-y-9">
                <InputField label="name" icon="id-badge" v-model="form.name" />
                <InputField label="email" type="email" icon="at" v-model="form.email" />
                <InputField label="password" icon="key" v-model="form.password" />
                <InputField label="confirm-password" icon="key" v-model="form.password_confirmation" />
                <p class="text-slate-500 text-sm dark:text-slate-400">
                By creating an account, you agree to our Terms of Service and
                Privacy Policy.
            </p>

                <PrimaryBtn :disabled="form.processing">Register</PrimaryBtn>
        </form>

        
   </Container>
  
</template>