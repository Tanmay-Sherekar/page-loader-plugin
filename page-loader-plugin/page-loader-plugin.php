<?php
/*
Plugin Name: Advanced Page Loader Plugin
Description: Curved shutter loader with developer icons and animation
Version: 1.4
Author: Your Name
*/

// Add loader HTML
function pl_add_loader() {
    ?>
    <div id="page-loader">
        <div class="shutter left"></div>
        <div class="shutter right"></div>

        <div class="loader-content">
            <div class="icons">
                <span>💻</span>
                <span>⚡</span>
                <span>🐘</span>
                <span>🐳</span>
                <span>🌐</span>
            </div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'pl_add_loader');

// Add CSS & JS
function pl_loader_assets() {
    ?>
    <style>
        #page-loader {
            position: fixed;
            width: 100%;
            height: 100%;
            background: #000;
            top: 0;
            left: 0;
            z-index: 9999;
            overflow: hidden;
        }

        .shutter {
            position: absolute;
            width: 55%;
            height: 100%;
            background: #000;
            top: 0;
            z-index: 2;
            transition: transform 1.2s cubic-bezier(0.77, 0, 0.175, 1);
        }

        .shutter.left {
            left: 0;
            border-top-right-radius: 80% 100%;
            border-bottom-right-radius: 80% 100%;
        }

        .shutter.right {
            right: 0;
            border-top-left-radius: 80% 100%;
            border-bottom-left-radius: 80% 100%;
        }

        #page-loader.open .shutter.left {
            transform: translateX(-120%);
        }

        #page-loader.open .shutter.right {
            transform: translateX(120%);
        }

        .loader-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 3;
        }

        .icons span {
            font-size: 28px;
            margin: 0 8px;
            display: inline-block;
            animation: float 1.5s infinite ease-in-out;
        }

        .icons span:nth-child(1) { animation-delay: 0s; }
        .icons span:nth-child(2) { animation-delay: 0.2s; }
        .icons span:nth-child(3) { animation-delay: 0.4s; }
        .icons span:nth-child(4) { animation-delay: 0.6s; }
        .icons span:nth-child(5) { animation-delay: 0.8s; }

        @keyframes float {
            0%, 100% { transform: translateY(0); opacity: 0.6; }
            50% { transform: translateY(-10px); opacity: 1; }
        }

        .loading-text {
            margin-top: 15px;
            color: #fff;
            font-size: 20px;
            letter-spacing: 3px;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
    </style>

    <script>
        window.addEventListener("load", function(){
            setTimeout(function(){
                document.getElementById("page-loader").classList.add("open");
            }, 300);

            setTimeout(function(){
                document.getElementById("page-loader").style.display = "none";
            }, 1500);
        });
    </script>
    <?php
}
add_action('wp_head', 'pl_loader_assets');