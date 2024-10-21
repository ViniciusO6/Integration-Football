<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Janeiro 2024</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calendar">
        <div class="month">
            <h1>JANEIRO 2024</h1>
            <div class="navigation">
                <span class="prev">&lt;</span>
                <span class="next">&gt;</span>
            </div>
        </div>
        <div class="weekdays">
            <div>Domingo</div>
            <div>Segunda</div>
            <div>Terça</div>
            <div>Quarta</div>
            <div>Quinta</div>
            <div>Sexta</div>
            <div>Sábado</div>
        </div>
        <div class="days">
            <!-- Primeira semana -->
            <div class="day inactive"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day active"></div>
            <div class="day inactive"></div>

            <!-- Segunda semana -->
            <div class="day inactive"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day inactive"></div>

            <!-- Terceira semana -->
            <div class="day inactive"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day inactive"></div>

            <!-- Quarta semana -->
            <div class="day inactive"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day"></div>
            <div class="day inactive"></div>
        </div>
    </div>



    <script>
        const months = [
            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
        ];

        let currentMonth = 0; // Janeiro é o mês inicial
        let currentYear = 2024;

        // Função para gerar o calendário
        function generateCalendar(month, year) {
            const daysContainer = document.getElementById('days-container');
            const monthYearDisplay = document.getElementById('month-year');
            daysContainer.innerHTML = ''; // Limpar os dias antigos

            // Atualizar título do mês
            monthYearDisplay.textContent = `${months[month]} ${year}`;

            // Obter o primeiro e o último dia do mês
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Adicionar espaços em branco para os dias antes do primeiro dia
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.classList.add('day', 'inactive');
                daysContainer.appendChild(emptyDay);
            }

            // Adicionar os dias do mês
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('day');
                dayElement.textContent = day;

                // Exemplo de como destacar um dia (pode personalizar conforme necessário)
                if (day === 18 && month === 0 && year === 2024) {
                    dayElement.classList.add('active'); // Exemplo: dia 18 de janeiro de 2024
                }
                
                daysContainer.appendChild(dayElement);
            }
        }

        // Função para mudar o mês
        function changeMonth(direction) {
            currentMonth += direction;

            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            } else if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }

            generateCalendar(currentMonth, currentYear);
        }

        // Gera o calendário inicial (Janeiro 2024)
        generateCalendar(currentMonth, currentYear);
    </script>

    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f7f7f7;
}

.calendar {
    width: 320px;
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.month {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.month h1 {
    font-size: 24px;
}

.navigation {
    font-size: 18px;
    cursor: pointer;
}

.weekdays {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    font-size: 12px;
    color: gray;
}

.days {
    display: flex;
    flex-wrap: wrap;
}

.day {
    width: 40px;
    height: 40px;
    margin: 5px;
    border: 2px solid #ccc;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.day:hover {
    border-color: #000;
}

.day.inactive {
    background-color: #f0f0f0;
    cursor: not-allowed;
}

.day.active {
    border-color: #4caf50;
}

.day:nth-child(5),
.day:nth-child(10),
.day:nth-child(15) {
    border-color: #ff9800;
}



    </style>
</body>
</html>
