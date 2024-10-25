package com.example.myapplication77;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import com.example.myapplication77.ui.model.Items;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationCallback;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationResult;
import com.google.android.gms.location.LocationServices;

import java.util.ArrayList;
import java.util.List;

public class NewGameActivity extends AppCompatActivity {

    private Button newGameButton;
    private Button previousGamesButton;
    private Button currentGamesButton;
    private List<Items> itemsList = new ArrayList<>();

    private TextView locationTextView;
    private TextView rView;
    private FusedLocationProviderClient fusedLocationClient;
    private LocationCallback locationCallback;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home_p);

        newGameButton = findViewById(R.id.newGameButton);
        previousGamesButton = findViewById(R.id.previousGamesButton);
        currentGamesButton = findViewById(R.id.currentGamesButton);
        locationTextView = findViewById(R.id.locationTextView);
        rView = findViewById(R.id.rView);
        fusedLocationClient = LocationServices.getFusedLocationProviderClient(this);

        newGameButton.setOnClickListener(view -> startActivity(new Intent(NewGameActivity.this, NewEntryActivity.class)));
        previousGamesButton.setOnClickListener(view -> startActivity(new Intent(NewGameActivity.this, MainActivity.class)));
        currentGamesButton.setOnClickListener(view -> startActivity(new Intent(NewGameActivity.this, MainActivity.class)));
        String value = getIntent().getStringExtra("key");

        // Check and request location permission if not granted
        if (ContextCompat.checkSelfPermission(
                this,
                Manifest.permission.ACCESS_FINE_LOCATION
        ) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(
                    this,
                    new String[]{Manifest.permission.ACCESS_FINE_LOCATION},
                    LOCATION_PERMISSION_REQUEST_CODE
            );
        } else {
            startLocationUpdates();
        }
    }

    private void startLocationUpdates() {
        LocationRequest locationRequest = LocationRequest.create();
        locationRequest.setInterval(10000); // Update location every 10 seconds
        locationCallback = new LocationCallback(){
            @Override
            public void onLocationResult(LocationResult locationResult) {
                if (locationResult.getLastLocation() != null) {
                    double latitude = locationResult.getLastLocation().getLatitude();
                    double longitude = locationResult.getLastLocation().getLongitude();

                    // Display latitude and longitude in the locationTextView
                    locationTextView.setText(String.format("Latitude: %f\nLongitude: %f", latitude, longitude));
                }
            }
        };

        // Check location permissions again (just in case)
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED) {
            fusedLocationClient.requestLocationUpdates(locationRequest, locationCallback, null);
        } else {
            // Handle the case when location permission is not granted
            showToast("Location permission denied. Please grant the permission.");
        }
    }

    @Override
    protected void onStop() {
        super.onStop();
        stopLocationUpdates();
    }

    private void stopLocationUpdates() {
        fusedLocationClient.removeLocationUpdates(locationCallback);
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == LOCATION_PERMISSION_REQUEST_CODE) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                startLocationUpdates();
            } else {
                // Handle the case when location permission is denied
                showToast("Location permission denied. Please grant the permission.");
            }
        }
    }

    private void showToast(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }
    private static final int LOCATION_PERMISSION_REQUEST_CODE = 1;

}