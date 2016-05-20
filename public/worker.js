self.addEventListener('install', (e) => {
    console.info('install', e);
});

self.addEventListener('activate', (e) => {
    console.info('activate', e);
});

self.addEventListener('push', (e, data) => {
    e.waitUntil(
        self.registration.showNotification("Push通知タイトル", {
            body: "Push通知本文"
        })
    )
});
