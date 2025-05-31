<!-- Header / Navbar -->
<header style="  background: linear-gradient(to bottom, #5645f4, #f58adf); color: white; padding: 10px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1000px; margin: auto; padding: 0 20px;">
        <div style="font-size: 28px; font-weight: bold; letter-spacing: 1px;">Twist<span style="color:#000000;">Team</span></div>
        <nav style="display: flex; gap: 20px;">
            <a href="/" style="color: white; text-decoration: none; font-weight: 500; position: relative;">Home</a>
            <a href="spin" style="color: white; text-decoration: none; font-weight: 500; position: relative;">Spin</a>
            <a href="gacha" style="color: white; text-decoration: none; font-weight: 500; position: relative;">Gacha</a>
        </nav>
    </div>
</header>

<style>
    header nav a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: rgb(0, 0, 0);
        transition: width 0.3s;
    }

    header nav a:hover::after {
        width: 100%;
    }

    header nav a:hover {
        color: rgb(0, 0, 0);
    }
</style>