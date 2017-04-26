<template>
    <div>
        <section class="content-main">
            <field label="Nota">
                <div class="has-some-width">
                    <textarea id="note" class="textarea" :class="{'is-disabled': !enableInput}" cols="5" rows="100">{{ note.note }}</textarea>
                </div>
            </field>
        </section>

        <section class="content-body">
            <item-line v-for="body in loadNote.body" :label="body.label" :value="body.value" :enable-input="enableInput"></item-line>
        </section>
    </div>
</template>

<script>
    import Field from '../base/Field.vue';
    import ItemLine from '../item/ItemLine.vue';

    export default {
        components: { Field, ItemLine },

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
                            prop: 'note',
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
        min-width: 0;
    }

    .has-some-width {
        width: 90%;
    }
</style>