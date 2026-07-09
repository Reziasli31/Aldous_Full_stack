import 'package:flutter/material.dart';

import '../services/api_service.dart';

import 'berita_screen.dart';

class HomeScreen extends StatefulWidget {
  final String username;

  const HomeScreen({super.key, required this.username});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  List akun = [];

  var berita;

  @override
  void initState() {
    super.initState();

    loadData();
  }

  void loadData() async {
    var a = await ApiService.getAkunTerbaru();

    var b = await ApiService.getBeritaTerbaru();

    setState(() {
      akun = a;

      berita = b;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Homeless Media")),

      body: SingleChildScrollView(
        padding: EdgeInsets.all(20),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,

          children: [
            Text(
              "Halo ${widget.username}",

              style: TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
            ),

            SizedBox(height: 25),

            Text(
              "Akun Terbaru",

              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),

            SizedBox(height: 10),

            ...akun.map((data) {
              return Card(
                child: ListTile(
                  title: Text(data['nama_registrasi']),

                  subtitle: Text(data['username']),
                ),
              );
            }),

            SizedBox(height: 25),

            Text(
              "Berita Terbaru",

              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),

            SizedBox(height: 10),

            if (berita != null)
              Card(
                child: ListTile(
                  title: Text(berita['judul_berita']),

                  subtitle: Text(
                    berita['isi_berita'].substring(
                      0,

                      berita['isi_berita'].length > 100
                          ? 100
                          : berita['isi_berita'].length,
                    ),
                  ),

                  onTap: () {
                    Navigator.push(
                      context,

                      MaterialPageRoute(
                        builder: (context) => BeritaScreen(login: true),
                      ),
                    );
                  },
                ),
              ),
          ],
        ),
      ),
    );
  }
}
