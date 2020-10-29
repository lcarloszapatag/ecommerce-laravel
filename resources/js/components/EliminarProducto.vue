<template>
    <input type="submit" class="btn btn-danger d-block w-100" value="Eliminar ×" @click="eliminarProducto" />
</template>

<script>
export default {
    props: ['productoId'],
    methods: {
        eliminarProducto() {
            this.$swal({
                title: '¿Deseas eliminar este producto?',
                text: 'Una vez eliminado, no se puede recuperar.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {
                    const params = {
                        id: this.productoId
                    }
                    axios.post(`/productos/${this.productoId}`, {params, _method: 'delete'})
                        .then(respuesta => {
                            this.$swal({
                                title: 'Producto eliminado',
                                text: 'Se eliminó el producto',
                                icon: 'success'
                            });
                            // console.log(this.$el);
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            })
        }
    }
}
</script>
