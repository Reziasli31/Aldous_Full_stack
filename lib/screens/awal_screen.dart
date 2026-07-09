import 'package:flutter/material.dart';

class AwalScreen extends StatelessWidget {
  final String username;

  const AwalScreen({super.key, required this.username});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Homeless Media")),

      body: Center(child: Text("Halo $username")),
    );
  }
}
