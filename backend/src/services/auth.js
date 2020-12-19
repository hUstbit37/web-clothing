import axios from 'axios'
import decode from "jwt-decode";
import Vue from "vue";

const AUTH_TOKEN_KEY = 'authToken'
export const authService = {
    login,
    logout,
    isLoggedIn
}

function login(email, password){
    axios.post('api/v1/login', {
        email: email,
        password: password
    }).then((res) => {
        console.log(res)
        if (res.status === 200 && res.data.token) {
           setAuthToken(res.data.token)
        }
    }).catch((err) => {
        console.log(err)
    })
}
function logout(){
    axios.defaults.headers.common['Authorization'] = ''
    localStorage.removeItem(AUTH_TOKEN_KEY)
}
function isLoggedIn() {
    let authToken = getAuthToken()
    return !!authToken && !isTokenExpired(authToken)
}
function setAuthToken(token) {
    axios.defaults.headers.common['Authorization']= `Bearer ${token}`
    localStorage.setItem(AUTH_TOKEN_KEY, token)
}
function getAuthToken(){
    return localStorage.getItem(AUTH_TOKEN_KEY)
}
function getTokenExpirationDate(token){
    let endcodeToken = decode(token)
    if(!endcodeToken.exp) {
        return null
    }
    return new Date(endcodeToken.exp*1000)
}
function isTokenExpired(token) {
    return getTokenExpirationDate(token) < new Date()
}

