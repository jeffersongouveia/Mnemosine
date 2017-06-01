<template>
    <config-layout name="Usuários">
        <!-- TODO: adicionar uma coluna pra editar apenas o username e outra pra senha -->
        <table class="table scrollable">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Ativo</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in getUsers" :id="'user-' + user.id">
                    <td v-text="user.username"></td>
                    <td>Sim</td>
                    <td>
                        <button class="button is-primary is-small" @click="openEdit(user)">
                            <span class="icon">
                                <i class="fa fa-pencil-square-o"></i>
                            </span>
                        </button>
                    </td>
                    <td>
                        <button class="button is-danger is-small" v-if="user.id != 1" @click="showConfirmation(user)">
                            <span class="icon">
                                <i class="fa fa-minus-circle"></i>
                            </span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="hold-on-bottom">
            <button class="button is-primary" @click="redirectToUserCreate">
                Adicionar usuário
            </button>
        </div>

        <user-edit :show="isToShow" :user="data" @hideModal="toggleModal" @updated="reloadData"></user-edit>

        <modal-confirmation :show="isToShowConfirmation" @hideModal="toggleModalConfirmation" @confirm="moveToTrash(data)">
            Tem certeza que deseja remover o usuário <span class="alert-text">{{ data.username }}</span>?
        </modal-confirmation>
    </config-layout>
</template>

<script>
    import Users from '../../models/Users';

    import ConfigLayout from './ConfigLayout.vue';
    import UserEdit from '../user/UserEdit.vue';
    import ModalConfirmation from '../base/ModalConfirmation.vue';

    export default {
        components: { ConfigLayout, UserEdit, ModalConfirmation },

        data() {
            return {
                users: new Users('/api/users'),
                data: {
                    id: 0,
                    username: '',
                    password: ''
                },

                isToShow: false,
                isToShowConfirmation: false
            }
        },

        computed: {
            getUsers() {
                return this.users.sortBy('username');
            }
        },

        methods: {
            redirectToUserCreate() {
                this.$router.push('/user/create');
            },

            toggleModal() {
              this.isToShow = !this.isToShow;
            },

            toggleModalConfirmation() {
                this.isToShowConfirmation = !this.isToShowConfirmation;
            },

            openEdit(user) {
                this.data.id = user.id;
                this.data.username = user.username;
                this.data.password = user.password;

                this.toggleModal();
            },

            reloadData(data) {

            },

            showConfirmation(user) {
                this.data = user;
                this.toggleModalConfirmation();
            },

            moveToTrash(user) {
                let form = new Form({
                    id: user.id
                });

                form.delete('/api/users/' + form.id).then(response => {
                    console.log('Response:');
                    console.log(response);

                    if(response) {
                        console.log(response);
                    } else {
                        this.toggleModalConfirmation();
                        this.users.remove(user);
                    }
                });
            }
        },

        created() {
            this.users.get();
        }
    }
</script>
