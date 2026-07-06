package programdaspro;
import java.util.*;

public class ProgramdasproP5 {

        public static void main(String[] args) {
            Scanner input = new Scanner(System.in);

            System.out.println("==================== Pilih Nomor Soal ====================");
            System.out.println("1. Luas Persegi");
            System.out.println("2. Luas Segitiga");
            System.out.println("3. Luas Lingkaran");
            System.out.println("4. Luas Trapesium");
            System.out.println("5. Luas Selimut Tabung");
            System.out.println("6. Luas Jajar Genjang");
            System.out.println("7. Volume Balok");
            System.out.println("8. Volume Tabung");
            System.out.println("9. Volume Kubus");
            System.out.println("10. Keliling Lingkaran");
            System.out.println("11. Keliling Persegi");
            System.out.println("12. Keliling Segitiga");
            System.out.println("13. Keliling Jajar Genjang");
            System.out.println("14. Beruang yang mana (Bebras)");
            System.out.println("15. Kalender (Bebras)");
            System.out.println("16. Kue Dadar (Bebras)");
            System.out.println("=========================================================");
            
            System.out.println("Masukkan nomor yang anda pilih");
            int nomor = input.nextInt();
            
            if (nomor == 1) {
                System.out.println("=================== Luas Persegi  ===================");
                System.out.println("");
                
                System.out.println("Masukkan panjang persegi");
                int p = input.nextInt();
                
                System.out.println("Masukkan lebar persegi");
                int l = input.nextInt();
                
                int luasPersegi = p*l;
                System.out.println("Luas Persegi = "+ luasPersegi);
            }else if (nomor == 2) {
                System.out.println("=================== Luas Segitiga ===================");
                System.out.println("");
                
                System.out.println("Masukkan alas");
                double alas = input.nextDouble();
                
                System.out.println("Masukkan tinggi");
                double tinggi = input.nextDouble();
                
                double luasSegitiga = 0.5*alas*tinggi;
                System.out.println("Luas Segitiga = "+ luasSegitiga);
            }else if (nomor == 3) {
                System.out.println("=================== Luas Lingkaran ===================");
                System.out.println("");
                
                System.out.println("Masukkan Jari Jari");
                int r = input.nextInt();
                
                double luasLingkaran = 3.14*r*r;
                System.out.println("Luas Lingkaran = "+ luasLingkaran);
            }else if (nomor == 4) { 
                System.out.println("=================== Luas Trapesium ===================");
                System.out.println("");

                System.out.println("Masukkan Alas Atas");
                int a = input.nextInt();

                System.out.println("Masukkan Alas Bawah");
                int b = input.nextInt();
                
                System.out.println("Masukkan Tinggi");
                int t = input.nextInt();

                double luasTrapesium = 0.5*(a+b)*t;
                System.out.println("Luas Trapesium = " + luasTrapesium);
            }else if (nomor == 5) {
                System.out.println("=================== Luas Selimut Tabung ===================");
                System.out.println("");

                System.out.println("Masukkan jari jari");
                int r = input.nextInt();

                System.out.println("Masukkan Tinggi");
                int t = input.nextInt();

                double luasSelimutTabung = 2*3.14*r*t;
                System.out.println("Luas Selimut Tabung = "+ luasSelimutTabung);
            }else if (nomor == 6) {
                System.out.println("=================== Luas Jajar Genjang ===================");
                System.out.println("");

                System.out.println("Masukkan Alas");
                int a = input.nextInt();

                System.out.println("Masukkan Tinggi");
                int t = input.nextInt();

                int luasJajargenjang = a*t;
                System.out.println("Luas Jajar Genjang = "+ luasJajargenjang);
            }else if (nomor == 7) {
                System.out.println("=================== Volume Balok ===================");
                System.out.println("");

                System.out.println("Masukkan Panjang Balok");
                int p = input.nextInt();
                
                System.out.println("Masukkan Lebar Balok");
                int l = input.nextInt();

                System.out.println("Masukkan Tinggi Balok");
                int t = input.nextInt();

                int volumeBalok = p*l*t;
                System.out.println("Volume Balok = "+ volumeBalok);
            }else if (nomor == 8) {
                System.out.println("=================== Volume Tabung ===================");
                System.out.println("");

                System.out.println("Masukkan Jari - jari");
                int r = input.nextInt();

                System.out.println("Masukkan Tinggi");
                int t = input.nextInt();

                double volumeTabung = 3.14*r*r*t;
                System.out.println("Volume Tabung = "+ volumeTabung);
            }else if (nomor == 9) {
                System.out.println("=================== Volume Kubus ===================");
                System.out.println("");

                System.out.println("Masukkan Rusuk Kubus");
                int s = input.nextInt();

                int volumeKubus = s*s*s;
                System.out.println("Volume Kubus = "+ volumeKubus);
            }else if (nomor == 10){
                System.out.println("=================== Keliling Lingkaran ===================");
                System.out.println("");

                System.out.println("Masukkan Jari - jari");
		        int jariJari = input.nextInt();
		
		        double KelilingLingkaran = 2 * 3.14 * jariJari;
                System.out.println("Keliling Lingkaran = "+ KelilingLingkaran);
                
            }else if (nomor == 11){
                System.out.println("=================== Keliling Persegi ===================");
                System.out.println("");

                System.out.println("Masukkan Sisi Persegi");
                int S = input.nextInt();

                int kelilingPersegi = S+S+S+S;
                System.out.println("Keliling Persegi = "+ kelilingPersegi);
            }else if (nomor == 12){
                System.out.println("=================== Keliling Segitiga ===================");
                System.out.println("");

                System.out.println("Masukkan Sisi a");
                int a = input.nextInt();
                
                System.err.println("Masukkan Sisi b");
                int b = input.nextInt();

                System.out.println("Masukkan Sisi c");
                int c = input.nextInt();

                int kelilingSegitiga = a + b + c;
                System.out.println("Keliling Segitiga = "+ kelilingSegitiga);
            }else if (nomor == 13){
                System.out.println("=================== Keliling Jajar Genjang ===================");
                System.out.println("");

                System.out.println("Masukkan AB");
                int ab = input.nextInt();

                System.out.println("Masukkan CD");
                int cd = input.nextInt();

                int kelilingJajargenjang = 2*(ab+cd);
                System.out.println("Keliling Jajar Genjang = "+ kelilingJajargenjang);
            }else if (nomor == 14){
                System.out.println("=================== Beruang yang mana? ===================");
                System.out.println("");
                System.out.println("Terdapat beberapa beruang yang menggunakan: ");
                System.out.println("1. Beruang dengan pita");
                System.out.println("2. Beruang dengan selendang dan bintang dikaki");
                System.out.println("3. Beruang dengan pita dan kacamata");
                System.out.println("4. Beruang dengan selendang, pita, dan kacamata");
                System.out.println("5. Beruang dengan bintang dikaki");
                System.out.println("6. Beruang dengan selendang, bintang dikaki dan kacamata");
                System.out.println("======================================");
                System.out.println("Rena hanya boleh membawa beruang yang :");
                System.out.println("1. Terdapat Bintang di kakinya");
                System.out.println("2. Memakai Selendang di lehernya atau pita");
                System.out.println("3. Tidak memakai kaca mata");
                System.out.println("======================================");
                System.out.println("Pilih Ketentuan Beruang yg sesuai (a / b / c / d)");
                System.out.println("a. Beruang dengan Selendang, kacamata, dan bintang dikaki");
                System.out.println("b. Beruang dengan bintang dikaki saja");
                System.out.println("c. Beruang dengan pita, selendang, kacamata, bintang dikaki");
                System.out.println("d. Beruang dengan selendang dan bintang dikaki");

                char Ketentuan = input.next().charAt(0);

                if (Ketentuan == 'd'){
                    System.out.println("Jawaban anda BENAR");
                }else{
                    System.out.println("Jawaban anda SALAH");
                }
            }else if (nomor == 15){
                System.out.println("=================== Kalender ===================");
                System.out.println("");
                System.out.println("Sehari sebelum 3 hari yang lalu adalah hari sebelum minggu.");
                System.out.println("Hari : Senin , Selasa , Rabu , Kamis , Jumat, Sabtu , Minggu");
                System.out.println("Pertanyaan : Besok hari apa ?");
                
                String hari = input.next();
                switch (hari) {
                    case "kamis":
                        System.out.println("Jawaban anda BENAR !");break;
                    default:
                        System.out.println("SALAH!");
                }
            }else if (nomor == 16){
                System.out.println("=================== Kue Dadar ===================");
                System.out.println("");
                System.out.println("Sinta melihat 3 kue dadar yang dibuat bunda tertumpuh disebuah piring");
                System.out.println("sinta ingin kue dadar apel. Bunda bilang hanya boleh mengambil kue dadar yang paing atas.");
                System.out.println("");
                System.out.println("Keterangan : Kue dadar apel berada di piring ke 3.");
                System.out.println("");
                System.out.println("Kue pertama diambil Ali, Bunda menaruh 4 kue dadar lagi diataasnya, yaitu : ");
                System.out.println("1 kue dadar apel kemudian 3 kue dadar lainnya.");
                System.out.println("Kemudian, Susi mengambil 2 kue dadar. Bunda menaruh 4 kue dadar lagi diatasnya yang semuanya bukan kue dadar apel.");
                System.out.println("");
                System.out.println("Pertanyaan : Berapa paling sedikit kue dadar yang harus diambil oleh anak lain supaya Sinta mendapatkan Kue dadar apel?");

                int kueApel = input.nextInt();
                if (kueApel == 5){
                    System.out.println("BENAR !");
                }else{
                    System.out.println("SALAH !");
                }
            }else{
                System.out.println("Nomor tidak ada dalam daftar :(");
            }
        }
    
}
