using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class autobeweeg : MonoBehaviour {



	public WheelCollider frontLeftWheel;
	public WheelCollider frontRightWheel;
	public WheelCollider backLeftWheel;
	public WheelCollider backRightWheel;

	public float resetTime = 5.0f;
	private float resetTimer = 0.0f;


	public float maxMoterKracht = 1000;
	public float maxStuurHoek = 30;

	public Vector3 com;
	public Rigidbody rb;

		


	// Use this for initialization
	void Start () {
		rb = GetComponent<Rigidbody> ();
		rb.centerOfMass = com;
	}
	
	// Update is called once per frame
	void FixedUpdate () {

		float moter = maxMoterKracht * Input.GetAxis ("Vertical") - Input.GetAxis("Boost");
		float stuur = maxStuurHoek * Input.GetAxis ("Horizontal");

		frontLeftWheel.steerAngle = stuur;
		frontRightWheel.steerAngle = stuur;

		backLeftWheel.motorTorque = moter;
		backRightWheel.motorTorque = moter;

		if (Input.GetKeyDown (KeyCode.JoystickButton4)) {
			maxMoterKracht = 3500f;
			print ("BOOST");
		} 
			else 
		{
			maxMoterKracht = 2500;
		}
		crashControle ();
		ZetWiel (frontLeftWheel);
		ZetWiel (frontRightWheel);
		ZetWiel (backLeftWheel);
		ZetWiel (backRightWheel);



	}




	void ZetWiel(WheelCollider collider)
	{
		Transform wiel = collider.transform.GetChild (0);
		Vector3 position;
		Quaternion rotation;
		collider.GetWorldPose (out position, out rotation);

		wiel.transform.position = position;
		wiel.transform.rotation = rotation;
	}


	private void crashControle(){
		
		if (transform.localEulerAngles.z > 80 && transform.localEulerAngles.z < 280) {
			resetTimer += Time.deltaTime;
		} else {
			resetTimer = 0;
		}
		if (resetTimer > resetTime) {
			

			FlipCar ();
		}
	}
	private void FlipCar (){
		print ("Flip");
		transform.rotation = Quaternion.LookRotation (transform.forward);
		transform.position += Vector3.up * 0.5f;
		GetComponent<Rigidbody> ().velocity = Vector3.zero;
		GetComponent<Rigidbody> ().angularVelocity = Vector3.zero;
		resetTimer = 0;
	}



			

}
