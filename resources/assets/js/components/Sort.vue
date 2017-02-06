<template>
    <dropdown :options="sort_options" @selectOption="selected">
        X itens ordenados por {{ selected_option }} <i class="fa fa-angle-down"></i>
    </dropdown>
</template>

<script>
    import Dropdown from './Dropdown.vue';

    export default {
        components: {
            'dropdown': Dropdown
        },

        data() {
            return {
                selected_option: 'Título',
                sort_options: [
                    'Título',
                    'IP',
                    'Frequência de Uso',
                    'Data de Modificação',
                    'Data de Criação',
                    'Data de Último Uso',
                    'Força da Senha',
                    'Idade da Senha',
                    '',
                    'Ordem Crescente',
                    'Ordem Decrescente',
                ]
            }
        },

        methods: {
            selected(option) {
                this.selected_option = option;
            }
        }
    }
</script>