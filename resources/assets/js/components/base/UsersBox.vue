<template>
    <!-- TODO: melhorar o design do box -->
    <div class="box">
        <article class="media">
            <div class="media-left">
                <label class="label">Usuários</label>
            </div>

            <div class="media-content">
                <div class="content">
                    <div class="control">
                        <label class="checkbox" v-for="user in getUsers">
                            <input type="checkbox" name="users" :value="user.id">
                            {{ user.name }}
                        </label>
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    import Users from '../../models/Users';

    export default {
        data() {
            return {
                users: new Users('/api/users')
            }
        },

        computed: {
            getUsers() {
                return this.users.getData();
            }
        },

        created() {
            this.users.get();
        }
    }
</script>