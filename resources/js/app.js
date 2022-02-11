require('./bootstrap')

import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader'
import { createApp } from 'vue'
import { createI18n } from 'vue-i18n'
import MainLink from './components/MainLink'
import HeaderButton from './components/HeaderButton'
import DeleteButton from './components/DeleteButton'

const i18n = new createI18n({
    locale: 'en', // window.navigator.languages[0].substring(0, 2),
    messages: languageBundle,
    globalInjection: true
})

export default i18n

let app = createApp({})

app.use(i18n)

app.mixin({ methods: { route: window.route } })

app.component('MainLink', MainLink)
app.component('HeaderButton', HeaderButton)
app.component('DeleteButton', DeleteButton)

document.addEventListener('DOMContentLoaded', () => {
    app.mount('#main')

    let successAlert = document.getElementById('success-message'),
        errorAlert = document.getElementById('error-message'),
        futursReminders = document.getElementById('show-futurs-reminders'),
        previousReminders = document.getElementById('show-previous-reminders')
    
    if (successAlert) {
        document.getElementById('dismiss-success').addEventListener('click', () => {
            document.getElementById('success-message').remove()
        })

        setTimeout(() => {
            document.getElementById('success-message').remove()
        }, 5000)
    }

    if (errorAlert) {
        document.getElementById('dismiss-error').addEventListener('click', () => {
            document.getElementById('error-message').remove()
        })

        setTimeout(() => {
            document.getElementById('error-message').remove()
        }, 5000)
    }

    if (futursReminders) {
        document.getElementById('show-futurs-reminders').addEventListener('click', () => {
            document.getElementById('futurs-reminders').classList = ['block']
            document.getElementById('show-futurs-reminders').classList = ['hidden']
        })
    }

    if (previousReminders) {
        document.getElementById('show-previous-reminders').addEventListener('click', () => {
            document.getElementById('previous-reminders').classList = ['block']
            document.getElementById('show-previous-reminders').classList = ['hidden']
        })
    }
})