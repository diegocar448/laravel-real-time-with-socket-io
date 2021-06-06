import Vue from 'vue'
import Bus from './bus'

window.Echo.channel('laravel_database_post-channel')
    .listen('PostCreated', (e) => {
        Bus.$emit('post-created', e.post)

        Vue.$vToastify.success(`Titulo do post ${e.post.name}`, 'Novo Post')
    })