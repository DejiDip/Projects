package com.example.myapplication77;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class GameDetailsActivity extends AppCompatActivity {
    // Declare UI elements and other necessary variables
    private TextView nameTextView;
    private TextView scoreTextView;
    private TextView score2TextView;
    private TextView score3TextView;
    private TextView dateTextView;


    @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_game_details);

            // Initialize UI elements
            TextView nameTextView = findViewById(R.id.nameTextView);
            TextView scoreTextView = findViewById(R.id.scoreTextView);
            TextView score2TextView = findViewById(R.id.score2TextView);
            TextView score3TextView = findViewById(R.id.score3TextView);
            TextView dateTextView = findViewById(R.id.dateTextView);

            // Retrieve game details from Intent
            Intent intent = getIntent();
            String name = intent.getStringExtra("name");
            String score = intent.getStringExtra("score");
            String score2 = intent.getStringExtra("score2");
            String score3 = intent.getStringExtra("score3");
            String date = intent.getStringExtra("date");

            // Display game details on the UI
            nameTextView.setText("Name: " + name);
            scoreTextView.setText("Score: " + score);
            score2TextView.setText("Score2: " + score2);
            score3TextView.setText("Score3: " + score3);
            dateTextView.setText("Date: " + date);
        }

}

