const onClickHref = (ev) => {
    const href = ev.target.getAttribute('href');

    if (!href || ev.target.closest('#wpadminbar'))
        return;

    ev.preventDefault();

    if (href === '#')
        return;

    const loading = document.getElementById('loading');
    loading.classList.add('show');

    history.pushState({}, '', href);

    jQuery.get(href, handlePage);
};

const onPopState = () => {
    jQuery.get(location.href, handlePage);
};

const handlePage = (html) => {
    const parser = new DOMParser();
    const parsed = parser.parseFromString(html, 'text/html');

    const container = document.getElementById('container');

    setTimeout(() => {
        const loading = document.getElementById('loading');
        document.title = parsed.querySelector('title').innerText;
        container.innerHTML = parsed.getElementById('container').innerHTML;
        loading.classList.remove('show');
    }, 1000);
};


document.addEventListener('click', onClickHref);
window.addEventListener('popstate', onPopState);