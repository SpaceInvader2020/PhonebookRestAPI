# PHONEBOOK REST API

**AUTHENTICATION**

To login send a POST request to http://localhost/api/login_check with login credentials:

**POST body example:**
<pre>
{
	"username": "admin@example.com",
	"password": "admin"
}
</pre>

**RESPONSE EXAMPLE**

Authentication response returns authorization token
<pre>
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MDU2Mzc5NjksImV4cCI6MTYwNTY0MTU2OSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiYWRtaW5AZXhhbXBsZS5jb20ifQ.ge4QJdeNw8PDbsa7I-ajXIVa29Knie9LxSqlkau9camU76Cz2YS4W2YCtwTyEqkUP9MYYYHuc9CERJcsnFenRHmkheIChM0wab1YhOQ082kEPVn2-Itj7uDWrArzxjXHRaxcRrqgqvflFf0bpw9FBiDI2273aptKdSkXnKOoh04xtp2aUEyloxSP0iUvV4Gx8Tip0Y3W5RUTEvLk02tREAUwRVVG3Idd6lJEWb_LElfIG9ASJyXjQQ0SslKrhubldGXDI4rGCcGyBOtBtv7aEAXvGfy0xHkdGop-pcnXclU5TNRLkqz-F54xhpbiyYtiwI4ajdiY8_9VxkLeMESLAF74bI3PhwPEnJ8Noz98tkWtgTmY2BHQkYHJ9yvYPCrMwiXtmJeXG5D7idM90iwxACV3cwafP1zad6wTycDoEjYTLyqX0J30MaIIgd8ERk_hOxfNA3iVo-lPm4G4RyOOOukcxeypf1-FPUBs6ipEKrl0NfqkpFXNos8_KsqumWMaHfQaz_08r3CWSZZLEABWmOmwlkwxRVC15X0F5lhwy8UzY5nINaBc5mZPq25dedjHGX0rTiA_hMR77IMkimWsG0VLiQRGnCQiY7btC8Bro-3QL-udqgsp7kewalT0Doe3UtAm5f1iGP6IivYrf4Fj-uDhGSykK_3P92vcAanvL7M",
    "refresh_token": "f3e450b5a28734ae791d1e9009dfe2f1084ec559a7b8cac55da3faa74827340dce99e061aeaffc09bbd917c1bc3c5e5945c081abe5ef9997e4a21454ef316f99"
}
</pre>

<br><br><br>
<hr>

**Phonebook Data**

Requests sent to http://localhost/api/phonebook/ requires JWT authorization token
To authorize send header `"Authorization: Bearer {token}"`.

**CREATE**

To create new phonebook record send POST request to `http://localhost/api/phonebook/`

**POST Body example**
<pre>
{
"firstName": "Johnny",
"lastName": "Smith",
"email":"john.smith@g.com",
"phone": "07819978122"
}
</pre>
<br><br><br>
<hr>

**READ ALL**

To read all phonebook records send GET request to `http://localhost/api/phonebook/`

**RESPONSE example**

<pre>
[
    {
        "id": 1,
        "firstName": "Caterina",
        "lastName": "Wisozk",
        "email": "hortense56@larkin.info",
        "phone": "825.629.3305 x33820"
    },
    {
        "id": 2,
        "firstName": "Heber",
        "lastName": "Zboncak",
        "email": "ahand@yahoo.com",
        "phone": "523-640-5907 x5123"
    },
    {
        "id": 3,
        "firstName": "Marilyne",
        "lastName": "Boyle",
        "email": "andres.kuhn@cartwright.com",
        "phone": "732.509.1516"
    },
    {
        "id": 4,
        "firstName": "Julio",
        "lastName": "Luettgen",
        "email": "johns.kylie@hotmail.com",
        "phone": "423-732-4640 x7040"
    }
]
</pre>

<br><br><br>
<hr>

**UPDATE**

To update phonebook record send PUT request to `http://localhost/api/phonebook/{id}`

**PUT Body example**
<pre>
{
"firstName": "Johnny",
"lastName": "Smith",
"email":"john.smith@g.com",
"phone": "07819978122"
}
</pre>

<br><br><br>
<hr>

**DELETE**

To delete a record from phonebook send DELETE request to `http://localhost/api/phonebook/{id}`

<br><br><br>
<hr>

**GET SINGLE RECORD**

To read single phonebook record send GET request to `http://localhost/api/phonebook/{id}`


**RESPONSE example**
<pre>
{
"firstName": "Johnny",
"lastName": "Smith",
"email":"john.smith@g.com",
"phone": "07819978122"
}
</pre>
<br><br><br>
<hr>

**REFRESH TOKEN**

This endpoint is used to refresh token when it has expired. 
Send POST request to `http://localhost/api/token/refresh`

_"refresh_token" can be retreived together with the token from authorization endpoint above._
**POST body example**

<pre>
{
	"refresh_token": "f3e450b5a28734ae791d1e9009dfe2f1084ec559a7b8cac55da3faa74827340dce99e061aeaffc09bbd917c1bc3c5e5945c081abe5ef9997e4a21454ef316f99"
}
</pre>

**RESPONSE example**
<pre>
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MDU2NDMwNDcsImV4cCI6MTYwNTY0NjY0Nywicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiYWRtaW5AZXhhbXBsZS5jb20ifQ.QnuSi-1lseth-GZAkHKf_ywqCEUTnJoXNkp5Td7oWNVmOTzDMGyCT7slezxFqYhG_63ow_oXblVPyiZJEDPACWV92qFSUBXciYHb0VHKW6uolyLarQTqgFL-iq6osmo-sypB-BUoFNtVs5qHJdiQxr6sGJeJpvoSUWVbJqpEq4sLicJC2Qhhtnt5f3pbXAgRO_ReG_x0RXNkQB1zb83dNM3LoXKyFP9D8b0WyLYaJ39_T0_dAf_Be7BWoZgK5O6u3p4XIHhKiQDOV5SxhOwiC_TqG9af9_WvwAOctfiy5Kw6e6zYi1TZEopILNfv-YFzJ6F0pvH9SxtQ_y1e_pxBpL-jurhcL-zy3Y2nRGNNVIoUA4Jg5Bl3QOP6EhaZLh925bNU_ylF-ktb9J45Ue4sKLKu50r4aXzluR_TKdvYkT6uw2Pu6fjAtxQJ6x6S-AsDxs5Jz1q0CXQsuglEoWFwQOygGUBkRL-X0ACpsX0GXTLhRLQvN8cAY_ccfZ8h49IaSO0HLXUVb-A5Y-qad_ox635fvqSJ0iovtRLT4WRW_LTRIT4xZP4lUIEHGvd-CY13756Xa6LFnKA7_dkT2TO5h-BmVx7UoEfRVT5yYA187uEwl2ukFbdz0mUCq_Q59NaoTlBdNpTpP6g4rGunNlQe4qGI-cYZTezRj3DxB-6Wi1w",
    "refresh_token": "f3e450b5a28734ae791d1e9009dfe2f1084ec559a7b8cac55da3faa74827340dce99e061aeaffc09bbd917c1bc3c5e5945c081abe5ef9997e4a21454ef316f99"
}
</pre>
<br><br><br>
<hr>

**TOKEN EXPIRED**

When authentication token is expired access to data is not available and authentication token needs to be refreshed

**RESPONSE EXAMPLE**

<pre>
{
    "code": 401,
    "message": "Expired JWT Token"
}
</pre>
