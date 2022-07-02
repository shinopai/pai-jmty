<template>
    <p v-if="isLiked" class="like__button" @click="unlikeItem(currentUserId)"><img :src="'/images/ico_basic02.png'" class="like__icon">お気に入り解除<span class="like__text--number">{{ likeNumber }}</span></p>
    <p v-else class="like__button" @click="likeItem(currentUserId)"><img :src="'/images/ico_basic01.png'" class="like__icon">お気に入り登録<span class="like__text--number">{{ likeNumber }}</span></p>
</template>

<script>
import axios from 'axios'
import { ref, onMounted } from 'vue'

export default {
  setup() {
    const currentUserId = ref()
    const likeNumber = ref()
    const isLiked = ref(Boolean)

    // get current user id
    const getCurrentUserId = async () => {
      await axios.get('/api/current_user_id')
                 .then( res => {
                   currentUserId.value = res.data
                   checkIsLiked(currentUserId.value)
                 })
                 .catch( err => {
                   console.log(err.response.data.message)
                 })
    }

    // check if current user liked this item
    const checkIsLiked = async (id) => {
      await axios.get('/api/users/' + id + '/items/' + itemId + '/check')
                 .then( res => {
                  if(res.data > 0){
                    isLiked.value = true
                  }else{
                    isLiked.value = false
                  }
                 })
                 .catch( err => {
                   console.log(err.response.data.message)
                 })
    }

    // get like number
    const getLikeNumber = async () => {
      await axios.get('/api/items/' + itemId + '/like_number')
                 .then( res => {
                   likeNumber.value = res.data
                 })
                 .catch( err => {
                   console.log(err.response.data.message)
                 })
    }

    // like item
    const likeItem = async (id) => {
      if(id == 'not logged in'){
        alert('ログインが必要です')
      }else{
        await axios.post('/api/users/' + id + '/items/' + itemId + '/like', {
          user: id,
          item: itemId
        })
          .then( res => {
            getCurrentUserId()
            getLikeNumber()
          })
          .catch( err => {
            console.log(err.response.data.message)
          })
      }
    }

    // unlike item
    const unlikeItem = async (id) => {
      if(id == 'not logged in'){
        alert('ログインが必要です')
      }else{
        await axios.post('/api/users/' + id + '/items/' + itemId + '/unlike', {
          user: id,
          item: itemId
        })
          .then( res => {
            getCurrentUserId()
            getLikeNumber()
          })
          .catch( err => {
            console.log(err.response.data.message)
          })
      }
    }

    onMounted(() => {
      getCurrentUserId()
      getLikeNumber()
    })

    return {
      likeNumber, currentUserId, likeItem, unlikeItem, isLiked
    }
  },
}
</script>
