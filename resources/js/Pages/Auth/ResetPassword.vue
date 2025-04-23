<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    token: String,
    email: String
})
const form = useForm({
       token: props.token,
        email: props.email,
        password: '',
        password_confirmation: ''
})

const submit = () => {
        form.post(route('password.update'), {
                onFinish: () => form.reset('password', 'confirm_password')
        })
}

</script>

<template>
         <Head title="-Reset password" />
   <Container class="w-1/2 ">
        <div class="text-center mb-8">
                <Title>Reset password</Title>
                
        </div>

        <ErrorMessage :errors="form.errors" />

        <form @submit.prevent="submit" class="space-y-9">
                
                <InputField label="email" type="email" icon="at" v-model="form.email" />
                <InputField label="password" icon="key" v-model="form.password" />
                <InputField label="confirm-password" icon="key" v-model="form.password_confirmation" />
               
                <PrimaryBtn :disabled="form.processing">Reset Password</PrimaryBtn>
        </form>

        
   </Container>
  
</template>