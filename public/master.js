navigator.serviceWorker.register('worker.js')
    .then((registration) => {
        return registration.pushManager.getSubscription().then(function (subscription) {
            if (subscription) {
                return subscription
            }
            return registration.pushManager.subscribe({
                userVisibleOnly: true
            })
        }).then(function (subscription) {
            var endpoint = subscription.endpoint
            console.log("pushManager endpoint:", endpoint);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/store');
            xhr.send(endpoint);
        }).catch(function (error) {
            console.warn("serviceWorker error:", error)
        })
    });