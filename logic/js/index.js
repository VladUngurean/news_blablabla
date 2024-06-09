async function loadPosts(lang) {
    const response = await fetch(`logic/test.json`);
    if (!response.ok) {
        console.error("Failed to load posts.json");
        return [];
    }
    const data = await response.json();

    return data.posts.map(post => ({
        postCategory: post.postCategory[lang] || post.postCategory['ru'],
        postTitle: post.postTitle[lang] || post.postTitle['ru'],
        postDate: post.postDate,
        postContent: post.postContent[lang] || post.postContent['ru']
    }));
}

function displayPosts(posts) {
    const container = document.getElementById("posts-container");
    container.innerHTML = "";

    posts.forEach(post => {
        const postElement = document.createElement("div");
        postElement.innerHTML = `
                <h2>${post.postTitle}</h2>
                <p>${post.postCategory}</p>
                <p>${post.postContent}</p>
                <span>${post.postDate}</span>
            `;
        container.appendChild(postElement);
    });
}

function setLanguage(lang) {
    const url = new URL(window.location);
    url.searchParams.set('lang', lang);
    window.location = url.toString();
}

document.addEventListener("DOMContentLoaded", async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const lang = urlParams.get('lang') || 'ru';
    const posts = await loadPosts(lang);
    displayPosts(posts);

    // Set the active language button
    document.querySelectorAll('.language-buttons button').forEach(button => {
        button.disabled = button.dataset.lang === lang;
    });
});