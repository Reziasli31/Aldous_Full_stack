import 'package:flutter/material.dart';

import '../services/api_service.dart';

import 'home_screen.dart';
import 'pengunjung_screen.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({super.key});

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final usernameController = TextEditingController();

  final passwordController = TextEditingController();

  void prosesLogin() async {
    var hasil = await ApiService.login(
      usernameController.text,

      passwordController.text,
    );

    if (hasil['status'] == "success") {
      Navigator.pushReplacement(
        context,

        MaterialPageRoute(
          builder: (context) => HomeScreen(username: hasil['username']),
        ),
      );
    } else {
      ScaffoldMessenger.of(
        context,
      ).showSnackBar(SnackBar(content: Text("Login gagal")));
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Homeless Media")),

      body: Padding(
        padding: EdgeInsets.all(20),

        child: Column(
          children: [
            TextField(
              controller: usernameController,

              decoration: InputDecoration(labelText: "Username"),
            ),

            TextField(
              controller: passwordController,

              obscureText: true,

              decoration: InputDecoration(labelText: "Password"),
            ),

            SizedBox(height: 20),

            ElevatedButton(onPressed: prosesLogin, child: Text("LOGIN")),

            SizedBox(height: 10),

            ElevatedButton(
              onPressed: () {
                Navigator.push(
                  context,

                  MaterialPageRoute(builder: (context) => PengunjungScreen()),
                );
              },

              child: Text("Pengunjung"),
            ),
          ],
        ),
      ),
    );
  }
}
