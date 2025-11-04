<style>
.sidebar {
    width: 250px;
    min-height: 100vh;
    background-color: #1f2937;
    color: white;
    display: flex;
    flex-direction: column;
    padding: 20px;
}

.sidebar .brand {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.sidebar .brand .logo {
    font-size: 1.5rem;
    font-weight: bold;
    margin-right: 10px;
}

.sidebar .menu a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    margin-bottom: 5px;
    color: white;
    text-decoration: none;
    border-radius: 4px;
}

.sidebar .menu a.active {
    background-color: #4f46e5;
}

.sidebar .menu a .icon {
    margin-right: 8px;
}

.spacer {
    flex: 1;
}

/* Profile dropdown styles */
.sidebar-profile {
    padding-top: 10px;
    border-top: 1px solid rgba(255,255,255,0.2);
    position: relative;
}

.profile-info {
    display: flex;
    align-items: center;
    cursor: pointer;
    justify-content: center; /* center the circle */
    padding: 10px 0;
}

.profile-pic {
    width: 40px;
    height: 40px;
    background-color: #4b5563; /* placeholder color */
    border-radius: 50%;
    border: 2px solid #fff;
}

.profile-dropdown {
    display: flex;
    flex-direction: column;
    position: absolute;
    bottom: 60px; /* above the profile pic */
    left: 50%;
    transform: translateX(-50%);
    background-color: #374151;
    border-radius: 6px;
    overflow: hidden;
    min-width: 120px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    z-index: 10;
}

.profile-dropdown a,
.profile-dropdown button {
    padding: 10px;
    text-decoration: none;
    color: white;
    background: none;
    border: none;
    text-align: center;
    cursor: pointer;
    font-size: 0.9rem;
}

.profile-dropdown a:hover,
.profile-dropdown button:hover {
    background-color: #4f46e5;
}

.hidden {
    display: none;
}
</style>

@php
    if (!function_exists('isActive')) {
        function isActive($pattern){
            return request()->is($pattern) ? 'active' : '';
        }
    }
@endphp

<aside class="sidebar">
    <div class="brand">
        <div>
            <h1>NouvoStudio</h1>
        </div>
    </div>

    <nav class="menu">
        <a href="{{ route('admin.dashboard') }}" class="{{ isActive('admin') }}">
            <span class="icon"><i class="fa-solid fa-gauge-high"></i></span>
            <span class="label">Dashboard</span>
        </a>

        <a href="{{ route('admin.users.index') }}" class="{{ isActive('admin/users*') }}">
            <span class="icon"><i class="fa-solid fa-users"></i></span>
            <span class="label">Users</span>
        </a>

        <!-- Add more modules here if needed -->
    </nav>

    <div class="spacer"></div>

    {{-- Profile dropdown --}}
    <div class="sidebar-profile">
        <div class="profile-info" onclick="toggleDropdown()">
            <img src="{{ asset('assets/img/userlogo.png') }}" alt="Profile" class="profile-pic">
        </div>

        <div id="profile-dropdown" class="profile-dropdown hidden">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</aside>



<script>
function toggleDropdown() {
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.classList.toggle('hidden');
}
</script>
