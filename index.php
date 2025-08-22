<!DOCTYPE html>
<html>
<head>
    <title>Generator SPRIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            color: #212529;
        }
        
        .container {
            max-width: 650px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 40px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 25px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            display: block;
        }
        
        h2 {
            color: #1a365d;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .subtitle {
            color: #6c757d;
            font-size: 14px;
            font-weight: 400;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            font-weight: 500;
            color: #374151;
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }
        
        .required::after {
            content: ' *';
            color: #dc3545;
        }
        
        .optional {
            color: #6c757d;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s ease;
            background: white;
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        
        textarea {
            resize: vertical;
            min-height: 80px;
            font-family: inherit;
        }
        
        .pelaksana-block {
            margin: 20px 0;
            padding: 20px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
        }
        
        .pelaksana-block h3 {
            color: #374151;
            font-size: 16px;
            margin-bottom: 15px;
            font-weight: 500;
        }
        
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 10px center;
            background-repeat: no-repeat;
            background-size: 16px;
            appearance: none;
            cursor: pointer;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background-color: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 25px;
            transition: background-color 0.2s ease;
        }
        
        button:hover {
            background-color: #1d4ed8;
        }
        
        button:active {
            background-color: #1e40af;
        }
        
        .pelaksana-container {
            margin-top: 15px;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 25px;
            }
            
            .row {
                grid-template-columns: 1fr;
            }
            
            h2 {
                font-size: 22px;
            }
            
            .logo {
                width: 60px;
                height: 60px;
            }
        }
        
        /* Subtle hover effects */
        input:hover, textarea:hover, select:hover {
            border-color: #9ca3af;
        }
        
        .pelaksana-block:hover {
            background: #f1f3f4;
        }
        
        /* Clean placeholder styling */
        ::placeholder {
            color: #9ca3af;
            font-size: 14px;
        }
    </style>
    <script>
        function togglePelaksana() {
            let jumlah = document.getElementById("jumlah").value;
            let container = document.getElementById("pelaksana-container");
            container.innerHTML = "";

            for (let i = 1; i <= jumlah; i++) {
                container.innerHTML += `
                    <div class="pelaksana-block">
                        <h3>Pelaksana ${i}</h3>
                        <div class="form-group">
                            <label class="required">Nama</label>
                            <input type="text" name="nama${i}" required placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label class="required">Jabatan</label>
                            <input type="text" name="jabatan${i}" required placeholder="Jabatan">
                        </div>
                    </div>
                `;
            }
        }

        window.onload = function() {
            document.getElementById("jumlah").value = "1";
            togglePelaksana();
        };
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Logo_BNN.svg/1024px-Logo_BNN.svg.png" alt="Logo BNN">
            <h2>Generator SPRIN</h2>
            <p class="subtitle">Badan Narkotika Nasional</p>
        </div>
        
        <form action="generate.php" method="post">
            <div class="form-group">
                <label class="required">No SPRIN</label>
                <input type="text" name="nomor" required placeholder="Contoh: SPRIN/001/BNN/2024">
            </div>

            <div class="form-group">
                <label class="required">Nama Kegiatan</label>
                <input type="text" name="kegiatan" required placeholder="Nama kegiatan">
            </div>

            <div class="form-group">
                <label class="optional">Dasar Kegiatan (opsional)</label>
                <textarea name="dasar" placeholder="Dasar hukum atau referensi kegiatan"></textarea>
            </div>

            <div class="form-group">
                <label class="required">Jumlah Pelaksana</label>
                <select name="jumlah" id="jumlah" onchange="togglePelaksana()">
                    <?php for ($i=1; $i<=20; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?> Orang</option>
                    <?php endfor; ?>
                </select>
            </div>

            <div id="pelaksana-container" class="pelaksana-container"></div>

            <div class="form-group">
                <label class="required">Tanggal</label>
                <div class="row">
                    <input type="date" name="tanggal_mulai" required>
                    <input type="date" name="tanggal_selesai" placeholder="Tanggal selesai (opsional)">
                </div>
            </div>

            <div class="form-group">
                <label class="required">Tempat</label>
                <input type="text" name="tempat" required placeholder="Lokasi kegiatan">
            </div>

            <div class="form-group">
                <label class="required">Waktu</label>
                <div class="row">
                    <input type="time" name="waktu_mulai" required>
                    <input type="time" name="waktu_selesai" placeholder="Waktu selesai (opsional)">
                </div>
            </div>

            <button type="submit">Generate SPRIN</button>
        </form>
    </div>
</body>
</html>