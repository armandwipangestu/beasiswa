<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        div {
            font-family: "Arial", Arial, Helvetica, sans-serif;
        }

        #table {
            /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
            font-family: "Arial", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #6777ef;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> <?= $title ?></h3>
        <span>Hari/Tanggal: <?= hari_indonesia(time()) ?></span>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($nama_pengajuan as $np) : ?>
                <tr>
                    <td scope="row"><?= $i ?></td>
                    <td><?= $np['nama'] ?></td>
                    <td><?= hari_indonesia($np['tanggal_pengajuan']) ?></td>
                    <td><?= $this->master->getAlasan($np['id']) ? $this->master->getAlasan($np['id'])['status'] : ""; ?></td>
                    <td>
                        <?= $this->master->getAlasan($np['id']) ? $this->master->getAlasan($np['id'])['alasan'] : ""; ?>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>

<!-- <!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>No.</tr>
            <tr>Nama Mahasiswa</tr>
            <tr>Tanggal Pengajuan</tr>
            <tr>Status</tr>
            <tr>Alasan</tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($nama_pengajuan as $np) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $np['nama'] ?></td>
                    <td><?= hari_indonesia($np['tanggal_pengajuan']) ?></td>
                    <td><span><?= $np['status_pengajuan'] ?></span></td>
                    <td>
                        <?= $this->master->getAlasan($np['id']); ?>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html> -->