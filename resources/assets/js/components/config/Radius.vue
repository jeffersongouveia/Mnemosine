<template>
    <config-layout name="RADIUS">
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
                <tr v-for="radius in getRadius" :id="'radius-' + radius.id">
                    <td v-text="radius.username"></td>
                    <td>Sim</td>
                    <td>
                        <button class="button is-primary is-small" @click="openEdit(radius)">
                            <span class="icon">
                                <i class="fa fa-pencil-square-o"></i>
                            </span>
                        </button>
                    </td>
                    <td>
                        <button class="button is-danger is-small" @click="showConfirmation(radius)">
                            <span class="icon">
                                <i class="fa fa-minus-circle"></i>
                            </span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="hold-on-bottom">
            <button class="button is-primary" @click="redirectToRadiusCreate">
                Adicionar usuário RADIUS
            </button>
        </div>

        <radius-edit :show="isToShow" :radius="data" @hideModal="toogleModal" @updated="reloadData"></radius-edit>

        <modal-confirmation :show="isToShowConfirmation" @hideModal="toogleModalConfirmation" @confirm="moveToTrash(data)">
            Tem certeza que deseja remover o usuário <span class="alert-text">{{ data.username }}</span>?
        </modal-confirmation>
    </config-layout>
</template>

<script>
    import Radius from '../../models/Radius';

    import ConfigLayout from './ConfigLayout.vue';
    import RadiusEdit from '../radius/RadiusEdit.vue';
    import ModalConfirmation from '../base/ModalConfirmation.vue';

    export default {
        components: { ConfigLayout, RadiusEdit, ModalConfirmation },

        data() {
            return {
                radius: new Radius('/api/radius'),
                data: {
                    id: 0,
                    username: '',
                    value: ''
                },

                isToShow: false,
                isToShowConfirmation: false
            }
        },

        computed: {
            getRadius() {
                return this.radius.sortBy('username');
            }
        },

        methods: {
            redirectToRadiusCreate() {
                this.$router.push('/radius/create');
            },

            toogleModal() {
                this.isToShow = !this.isToShow;
            },

            toogleModalConfirmation() {
                this.isToShowConfirmation = !this.isToShowConfirmation;
            },

            openEdit(radius) {
                this.data.id = radius.id;
                this.data.username = radius.username;
                this.data.value = radius.value;

                this.toogleModal();
            },

            reloadData(data) {
                for(let radius in this.getRadius) {
                    if(this.getRadius[radius]['id'] == data['id']) {
                        this.getRadius[radius]['username'] = data['username'];
                        this.getRadius[radius]['value'] = data['value'];
                    }
                }
            },

            showConfirmation(radius) {
                this.data = radius;

                this.toogleModalConfirmation();
            },

            moveToTrash(radius) {
                let form = new Form({
                    id: radius.id
                });

                form.delete('/api/radius/' + radius.id).then(() => {
                    this.toogleModalConfirmation();

                    this.radius.remove(radius);
                });
            }
        },

        created() {
            this.radius.get();
        }
    }
</script>