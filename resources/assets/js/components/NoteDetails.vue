<template>
    <div>
        <section class="content-main">
            <div class="container">
                <div class="line">
                    <label class="label">Nota</label>

                    <textarea class="info textarea is-disabled" cols="5" rows="100">{{ note.note }}</textarea>
                </div>
            </div>
        </section>

        <section class="content-body">
            <item-line v-for="body in loadNote.body" :label="body.label" :value="body.value"></item-line>
        </section>
    </div>
</template>

<script>
    import ItemLine from './ItemLine.vue';

    export default {
        components: {
            'item-line': ItemLine
        },

        props: {
            note: {
                required: true,
                type: Object
            }
        },

        computed: {
            loadNote() {
                return {
                    main: [
                        {
                            label: 'Nota',
                            value: this.note.note,
                            enableCopy: false
                        }
                    ],

                    body: []
                }
            }
        }
    }
</script>

<style lang="css">
    .content-main .container .line .textarea {

    }
</style>