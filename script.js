$(document).ready(function() {
    function updateSolvedCount() {
        $.ajax({
            url: 'getSolvedTasks.php',
            type: 'GET',
            success: function(data) {
                $('#solvedCount').text(data);
                if (data > 0) {
                    document.getElementById('audio').play();
                }
            },
            error: function() {
                console.log('Ошибка при получении количества решенных проблем');
            }
        });
    }

    // Обновление количества решенных проблем каждые 5 секунд
    setInterval(updateSolvedCount, 5000);
});