<template>
    <create title="Novo Usuário RADIUS" :data="data" @submit="onSubmit">
        <!--<field label="Força da senha">-->
            <!--<strength :value="strength"></strength>-->
        <!--</field>-->
    </create>
</template>

<script>
    import Create from '../base/Create.vue';
    import Field from '../base/Field.vue';
    import Strength from '../base/Strength.vue';

    export default {
    	components: { Create, Field, Strength },

        data() {
            return {
                data: [
                    {
                        label: 'Usuário',
                        prop: 'username',
                        value: ''
                    },
                    {
                        label: 'Senha',
                        prop: 'value',
                        value: ''
                    }
                ],

                strength: 0
            }
        },

        methods: {
            onSubmit(form) {
			    form.post('/api/radius').then(response => this.$router.push('/logins'));
            }
        }
    }
</script>