import 'package:flutter/material.dart';

import '../services/api_service.dart';

class BeritaScreen extends StatefulWidget {
  final bool login;

  const BeritaScreen({super.key, required this.login});

  @override
  State<BeritaScreen> createState() => _BeritaScreenState();
}

class _BeritaScreenState extends State<BeritaScreen> {
  List berita = [];

  @override
  void initState() {
    super.initState();

    loadBerita();
  }

  void loadBerita() async {
    var data = await ApiService.getBeritaTerbaru();

    setState(() {
      berita = data;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Berita")),

      body: ListView.builder(
        itemCount: berita.length,

        itemBuilder: (context, index) {
          var data = berita[index];

          return Card(
            margin: EdgeInsets.all(10),

            child: ListTile(
              title: Text(data['judul_berita']),

              subtitle: Text(data['isi_berita']),
            ),
          );
        },
      ),

      floatingActionButton: widget.login
          ? FloatingActionButton(
              onPressed: () {
                // nanti masuk halaman tambah berita
              },

              child: Icon(Icons.add),
            )
          : null,
    );
  }
}
