# grading-system-ajax
Grading System with Ajax jQuery PHP Native/Vanilla

still early, incomplete, still not yet seen the grading system

just ignore about controllers, models and view folders, nothing special there, just use require or require_once

# for install
create database 'grading_system_belajar'
On your database, open a SQL terminal paste this and execute:

```sql
CREATE TABLE `pengguna` (
  `id` int(128) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(128) NOT NULL,
  `role` set('admin','siswa','dosen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pengguna` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'siswa'),
(3, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'dosen');

ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `pengguna`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `full_nama` varchar(50) NOT NULL,
  `jenis_kl` set('Laki-laki','Perempuan') NOT NULL,
  `agama` set('Islam','Kristen','Hindu','Budha') NOT NULL,
  `telepon` int(20) DEFAULT NULL,
  `hp` int(20) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `asal_smu` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `foto` blob,
  `alamat` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

```