import 'package:flutter/material.dart';

class PengunjungScreen extends StatelessWidget {
  const PengunjungScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Berita Pengunjung")),

      body: const Center(
        child: Text("Berita terbaru", style: TextStyle(fontSize: 20)),
      ),
    );
  }
}
