<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel de Números</title>
    <style>
        :root {
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1f2933;
            background-color: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .board {
            width: min(960px, 100%);
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 15px 60px rgba(15, 23, 42, 0.08);
        }

        .board h1 {
            margin: 0 0 24px;
            text-align: center;
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            font-weight: 600;
            color: #0f172a;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(70px, 1fr));
            gap: 14px;
        }

        button.number {
            position: relative;
            border: 1px solid #dbe2ef;
            border-radius: 16px;
            padding: 18px;
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2933;
            background: #ffffff;
            cursor: pointer;
            transition: transform 150ms ease, box-shadow 150ms ease, border-color 150ms ease;
        }

        button.number:hover:not(.used),
        button.number:focus-visible:not(.used) {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.1);
            border-color: #94a3b8;
            outline: none;
        }

        button.number.used {
            color: #94a3b8;
            background: #f1f5f9;
        }

        button.number.used::after {
            content: "X";
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.75rem;
            color: #ef4444;
            font-weight: 700;
            pointer-events: none;
        }

        button.number span {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <main class="board">
        <h1>Selecione os números</h1>
        <section class="grid" aria-label="Números disponíveis">
            <?php for ($i = 1; $i <= 56; $i++): ?>
                <button class="number" data-number="<?= $i ?>">
                    <span><?= $i ?></span>
                </button>
            <?php endfor; ?>
        </section>
    </main>

    <script>
        const buttons = document.querySelectorAll('button.number');
        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                button.classList.toggle('used');
            });
        });
    </script>
</body>
</html>
