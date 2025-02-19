<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <Link class="navbar-brand fw-600" href="/">AppFunBD</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto"></ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <Link class="nav-link" :class="{ 'active': $page.url === '/home' }" href="/home">Dashboard</Link>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Settings</a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <Link class="dropdown-item" :class="{ 'active': $page.url === '/company' }" href="/company">Company</Link>
                            <Link class="dropdown-item" :class="{ 'active': $page.url === '/department' }" href="/department">Department</Link>
                            <Link class="dropdown-item" :class="{ 'active': $page.url === '/project' }" href="/project">Project</Link>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Localization</a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <button class="dropdown-item" @click="changeLanguage('en')">English</button>
                            <button class="dropdown-item" @click="changeLanguage('bn')">বাংলা</button>
                            <button class="dropdown-item" @click="changeLanguage('jp')">日本語</button>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $page.props.auth.user.username }}</a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <Link class="dropdown-item" href="/logout" method="post" as="button" type="button">Logout</Link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';
    import { usePage } from '@inertiajs/vue3';

    export default {
        components:{
            Link,
        },

        methods: {
            changeLanguage(lang) {
                const { router } = usePage();
                router.post("/localization", { locale: lang }, {
                    preserveState: true,
                    preserveScroll: true,
                });
            }
        },
    }
</script>
