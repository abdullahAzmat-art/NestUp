        </div><!-- /.admin-content -->
    </main><!-- /.admin-main -->
</div><!-- /.admin-wrapper -->

<!-- Scripts -->
<script>
    // Simple sidebar toggle for mobile (if needed)
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('admin-sidebar');
        // Additional mobile logic can go here
    });

    // Fade out flash messages if they exist
    const flash = document.querySelector('.flash-message');
    if (flash) {
        setTimeout(() => {
            flash.classList.add('fade-out');
            setTimeout(() => flash.remove(), 500);
        }, 3000);
    }
</script>

</body>
</html>
