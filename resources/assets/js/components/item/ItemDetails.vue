<template>
	<div class="item-details" v-if="item.id">
		<section class="header">
            <figure class="image is-32x32">
                <img v-if="isEquipment()" src="/img/icons/mikrotik.png" alt="Ícone do Login">
                <img v-else :src="item.icon" alt="Ícone do Login">
            </figure>

            <div class="control is-horizontal">
                <div v-if="isEquipment()">
                    <span v-if="!isEditable" class="title">{{ item.shortname }}</span>
                    <input v-else id="shortname" :value="item.shortname" type="text" class="input">
                </div>
                <div v-else>
                    <span v-if="!isEditable" class="title">{{ item.name }}</span>
                    <input v-else id="name" :value="item.name" type="text" class="input">
                </div>
            </div>

            <div class="hold-on-right">
                <span class="icon is-medium" @click="toogleFavorite">
                    <i id="favorite" class="fa" :class="[ item.favorite ? 'fa-star' : 'fa-star-o' ]"></i>
                </span>

                <span class="icon is-medium" @click="toogleEditable">
                    <i class="fa" :class="[ isEditable ? 'fa-unlock' : 'fa-lock' ]"></i>
                </span>
            </div>
		</section>

		<section class="content">
			<login-details v-if="isLogin()" :login="item" :enable-input="isEditable"></login-details>
            <note-details v-else-if="isNote()" :note="item" :enable-input="isEditable"></note-details>
            <equipment-details v-else-if="isEquipment()" :equipment="item" :enable-input="isEditable"></equipment-details>

			<section class="content-footer" v-show="!isEquipment()">
                <div class="container">
                    <div class="line">
                        <label class="label">Última alteração</label>

                        <span class="info">{{ item.updated_at }}</span>
                    </div>
                </div>

                <div class="container">
                    <div class="line">
                        <label class="label">Criado em</label>

                        <span class="info">{{ item.created_at }}</span>
                    </div>
                </div>
			</section>
		</section>

        <section class="edit-options" :class="{ 'show-edit-options': isEditable }">
            <div class="is-pulled-left">
                <a class="button is-danger" @click="toogleModal">
                    <span class="icon is-small">
                        <i class="fa fa-trash"></i>
                    </span>
                    <span>Mover para lixeira</span>
                </a>
            </div>

            <div class="is-pulled-right" @click="toogleEditable">
                <a class="button">
                    <span class="icon is-small">
                        <i class="fa fa-ban"></i>
                    </span>
                    <span>Cancelar</span>
                </a>

                <a class="button is-primary" @click="save">
                    <span class="icon is-small">
                        <i class="fa fa-save"></i>
                    </span>
                    <span>Salvar</span>
                </a>
            </div>
        </section>

        <modal-confirmation :show="isToShow" @hideModal="toogleModal" @confirm="moveToTrash">
            Tem certeza que deseja mover pra lixeira o item <span class="alert-text">{{ getName }}</span>?
        </modal-confirmation>
	</div>
</template>

<script>
    import LoginDetails from '../login/LoginDetails.vue';
    import NoteDetails from '../note/NoteDetails.vue';
    import EquipmentDetails from '../equipments/EquipmentDetails.vue';

    import ModalConfirmation from '../base/ModalConfirmation.vue';

	export default {
		components: { LoginDetails, NoteDetails, EquipmentDetails, ModalConfirmation },

		props: {
			item: {
                type: Object,
				required: true
			}
		},

        data() {
            return {
                isEditable: false,
                isToShow: false,

                props: [
                    //login
                    'name', 'username', 'password', 'strength', 'ip', 'dns', 'equipment',
                    //note
                    'note',
                    //equipment
                    'nasname', 'shortname', 'type', 'ports', 'secret', 'description'
                ],
                fields: {},
                form: {},

                urlLogin: '/api/logins/',
                urlNote: '/api/notes/',
                urlEquipment: '/api/equipments/'
            }
        },

        computed: {
            getUrl() {
                if(this.isLogin()) {
                    return this.urlLogin;
                } else {
                    if(this.isNote()) {
                        return this.urlNote;
                    } else {
                        return this.urlEquipment;
                    }
                }
            },

            getName() {
                return this.isEquipment() ? this.item.shortname : this.item.name;
            }
        },

        methods: {
            isLogin() {
                return typeof this.item['username'] !== 'undefined';
            },

            isNote() {
                return typeof this.item['note'] !== 'undefined';
            },

            isEquipment() {
                return typeof this.item['shortname'] !== 'undefined';
            },

            toogleEditable() {
                this.isEditable = !this.isEditable;
            },

            toogleModal() {
                this.isToShow = !this.isToShow;
            },

            isLogin() {
                return typeof this.item['username'] !== 'undefined';
            },

            isFavorite() {
                //verifica se o elemento de id favorite possui nas suas classes a fa-star-o
                return document.getElementById('favorite').classList.contains('fa-star');
            },

            toogleFavorite() {
                this.form = new Form({
                    id: this.item.id,
                    favorite: !this.isFavorite()
                });

                this.form.put(this.getUrl + this.item.id).then(response => {
                    this.item.favorite = !this.item.favorite;
                    this.$emit('toogleFavorite', this.item);
                });
            },

            //pega todos os valores dos inputs e os armazena numa variável
            loadData() {
                let field;

                for(let i = 0; i < this.props.length; i++) {
                    field = document.getElementById(this.props[i]);

                    //verifica se o input foi encontrado
                    if((typeof field === 'object') && (field !== null)) {
                        this.fields[this.props[i]] = field.value;
                    }
                }

                this.fields['id'] = this.item['id'];

                if(!this.isEquipment()) {
                    this.fields['id_vault'] = document.getElementById('vaults').value;
                    this.fields['favorite'] = this.isFavorite();
                }
            },

            //após editar um item pega os novos dados e atualiza o item passado via propriedade
            reloadItem() {
                for(let field in this.fields) {
                    this.item[field] = this.fields[field];
                }
            },

            save() {
                //pega os valores dos inputs e salva em this.fields
                this.loadData();
                //cria o form com os valores dos inputs
                this.form = new Form(this.fields);

                console.log(this.form);

                this.form.put(this.getUrl + this.form.id).then(response => {
                    //ao recarregar os campos do item o formulário já desabilita a edição
                    this.reloadItem();
                });
            },

            moveToTrash() {
                this.form = new Form({
                    id: this.item.id
                });

                this.form.delete(this.getUrl + this.item.id).then(response => {
                    //fecha o modal
                    this.toogleModal();
                    //desliga o modo de edição
                    this.toogleEditable();
                    //emite o aviso de remoção
                    this.$emit('moveToTrash', this.item);
                });
            }
        }
	}
</script>

<style>
    .hold-on-right .icon:hover {
        cursor: pointer;
    }

    .edit-options {
        position: fixed;
        bottom: 3em;

        -webkit-transition: opacity 0.3s ease-in-out;
        -moz-transition: opacity 0.3s ease-in-out;
        -o-transition: opacity 0.3s ease-in-out;
        -ms-transition: opacity 0.3s ease-in-out;
        transition: opacity 0.3s ease-in-out;

        display: none;
        opacity: 0;
    }

    .edit-options .is-pulled-left {
        position: fixed;
        left: 40%;
    }

    .edit-options .is-pulled-right {
        position: fixed;
        right: 1.5em;
    }

    .show-edit-options {
        display: block;
        opacity: 1;
    }
</style>