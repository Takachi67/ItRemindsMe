<template>
    <button class="btn btn-error rounded-full text-3xl" @click.prevent="deleteEntity">-</button>
</template>

<script>
import Swal from 'sweetalert2'
import i18n from '../app'

export default {
    name: 'DeleteButton',
    props: {
        link: {
            type: String,
            default: ''
        },
        message: {
            type: String,
            default: ''
        }
    },
    setup(props) {
        function deleteEntity() {
            Swal.fire({
                title: props.message,
                showCancelButton: true,
                confirmButtonText: i18n.global.t('default.yes'),
                cancelButtonText: i18n.global.t('default.no'),
            }).then((response) => {
                if (response.isConfirmed) {
                    window.location.href = props.link
                }
            })
        }

        return {
            deleteEntity
        }
    }
}
</script>

<style>
</style>