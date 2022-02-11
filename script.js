const stripe = Stripe("USE_YOUR_STRIPE_KEY_HERE")
const btn = document.querySelector('#btn')
btn.addEventListener('click', ()=>{
    fetch('/checkout.php',{
        method:"POST",
        headers:{
            'Content-Type' : 'application/json',
        },
        body: JSON.stringify({})
    }).then(res=> res.json())
    .then(payload => {
        stripe.redirectToCheckout({sessionId: payload.id})
    })
})