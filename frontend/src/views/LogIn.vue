<template>
    <q-page-container>
        <q-page padding>
    <div class="absolute-center relative-position" style="width: 450px;margin-bottom: 300px!important;">
      <q-card padding="50px;">
        <q-card-section>
          <div class="q-pa-md">
            <div class="q-gutter-md">
              <h5 class="text-center">One Stop E-Commerce</h5>
              <div class="alert-message">
                <q-banner dense inline-actions class="text-white bg-red">
                  Invalid Username or Password
                </q-banner>
              </div>
              <q-inner-loading
                label="Logging In..."
                label-class="text-blue"
                label-style="font-size: 1.1em"
              />

              <q-input type="email" label="Email/Username">
                <template v-slot:prepend>
                  <q-icon name="perm_identity" />
                </template>
              </q-input>
              <q-input type="password" label="Password">
                <template v-slot:prepend>
                  <q-icon name="lock" />
                </template>
              </q-input>
              <q-btn color="primary" icon-right="check">Login</q-btn>

              <p class="text-center">
                Copyright 2022 - SM Retail, Inc. <br />System Version 1.0.0
              </p>
            </div>
          </div>
        </q-card-section>
      </q-card>
    </div>
  </q-page>
    </q-page-container>
  
</template>
