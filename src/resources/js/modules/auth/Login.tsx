import React, { FormEvent } from 'react';
import { SetupLayout } from '../../shared/layout/SetupLayout';
import './login.scss';
import { FormGroup } from '../../shared/form/FormGroup';
import { TextInput } from '../../shared/form/TextInput';
import { useForm } from '@inertiajs/inertia-react';
import { FormLabel } from '../../shared/form/FormLabel';
import { Button } from '../../shared/Button';
import { Variant } from '../../shared/types/Variant';
import route from 'ziggy-js'

export default function Login() {
    const { data, setData, post } = useForm({
        email: '',
        password: ''
    });

    const handleSubmit = (event: FormEvent) => {
        event.preventDefault();

        post(route('auth.login'))
    }

    return (
        <SetupLayout>
            <div className="login-container">
                <h2>Welkom bij Sleep notes</h2>
                <form onSubmit={(event: FormEvent) => handleSubmit(event)}>
                    <FormGroup>
                        <FormLabel htmlFor="email">E-mail</FormLabel>
                        <TextInput id="email" onChange={(value: string) => setData('email', value)} />
                    </FormGroup>
                    <FormGroup>
                        <FormLabel htmlFor="password">Password</FormLabel>
                        <TextInput id="password" type="password" onChange={(value: string) => setData('password', value)} />
                    </FormGroup>
                    <div className="flex">
                        <Button
                            type="submit"
                            variant={Variant.Primary}
                            className="ml-auto"
                        >Login</Button>
                    </div>
                </form>
            </div>
        </SetupLayout>
    )
}
