<template>
    <div>
        <section class="content-main">
            <div class="container">
                <div class="line">
                    <label class="label">Nota</label>

                    <textarea class="info textarea" :class="{'is-disabled': !enableInput}" cols="5" rows="100">{{ note.note }}</textarea>
                </div>
            </div>
        </section>

        <section class="content-body">
            <item-line v-for="body in loadNote.body" :label="body.label" :value="body.value" :enable-input="enableInput"></item-line>
        </section>
    </div>
</template>

<script>
    import ItemLine from '../item/ItemLine.vue';

    export default {
        components: {
            'item-line': ItemLine
        },

        props: {
            note: {
                required: true,
                type: Object
            },

            enableInput: {
                required: false,
                default: false
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